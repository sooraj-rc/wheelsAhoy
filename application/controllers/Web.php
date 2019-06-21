<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
{
        public function __construct()
        {                     
                parent::__construct();
                $this->load->model('admin/admin_model');
        }

        public function index()
        {
                $this->gen_contents = array();
                $this->gen_contents['__web_settings']   = $this->admin_model->get_web_settings(); // get web settings
                $this->gen_contents['__countries']      = $this->admin_model->get_countries(); // get countries

                $this->gen_contents['__story']          = $this->admin_model->get_content_data('story'); // get story
                $this->gen_contents['__services']       = $this->admin_model->get_services(); // get services
                $this->gen_contents['__stocks']         = $this->admin_model->get_stocks(); // get stocks
                $this->gen_contents['__clients_builder']= $this->admin_model->get_clients('builder'); // get builder clients
                $this->gen_contents['__clients_truck']  = $this->admin_model->get_clients('truck'); // get truck clients
                $this->gen_contents['__testimonials']   = $this->admin_model->get_testimonials(); // get testimonials
                $this->gen_contents['__blogs']          = $this->admin_model->get_blogs(); // get blogs
                $this->gen_contents['__events_up']      = $this->admin_model->get_events('upcoming'); // get events - upcoming
                $this->gen_contents['__events_past']    = $this->admin_model->get_events('past'); // get events - past
                $this->gen_contents['__portfolio']      = $this->admin_model->get_portfolio(); // get portfolio

                //Sub titles
                $this->gen_contents['__service_sub']    = $this->admin_model->get_content_data('service_subtitle');
                $this->gen_contents['__market_sub']     = $this->admin_model->get_content_data('market_subtitle');
                $this->gen_contents['__testimonial_sub']= $this->admin_model->get_content_data('testimonial_subtitle');
                $this->gen_contents['__client_sub']     = $this->admin_model->get_content_data('client_subtitle');
                $this->gen_contents['__blog_sub']       = $this->admin_model->get_content_data('blog_subtitle');
                $this->gen_contents['__event_sub']      = $this->admin_model->get_content_data('event_subtitle');
                //p($this->gen_contents['__story'], true);
                $this->template->write_view('content', 'index', $this->gen_contents);
                $this->template->render();
        }

        public function post_contact_form(){
                
                $filesCount = count($_FILES['truck_images']['name']);
                for($i=0; $i<$filesCount; $i++){
                        $_FILES['truck_image']['name']     = $_FILES['truck_images']['name'][$i];
                        $_FILES['truck_image']['type']     = $_FILES['truck_images']['type'][$i];
                        $_FILES['truck_image']['tmp_name'] = $_FILES['truck_images']['tmp_name'][$i];
                        $_FILES['truck_image']['error']    = $_FILES['truck_images']['error'][$i];
                        $_FILES['truck_image']['size']     = $_FILES['truck_images']['size'][$i];
                        if(!empty($_FILES['truck_image']['name'])) {                                        
                                $config['upload_path']          = './assets/uploads/user-trucks/';
                                $config['allowed_types']        = 'jpg|png';
                                $config['encrypt_name'] = TRUE;
                                $this->load->library('upload', $config);
                                if ($this->upload->do_upload('truck_image')) {
                                        $upload_detail = $this->upload->data();                        
                                        $truck_images[$i] = $upload_detail["file_name"];
                                }
                        }
                }
                
                //p($this->input->post(),true);
                //$reference_id = strtoupper(substr(md5(uniqid()),0,15));
                $data = array(
                        'name' => $this->input->post('name'),
                        'email' => $this->input->post('email'),
                        'phone' => $this->input->post('phone'),
                        'country' => $this->input->post('country'),
                        'message' => $this->input->post('message'),
                        'contact_for' => $this->input->post('contact_for'),
                        'truck_image'  => implode(',',$truck_images),
                        //'reference_id' => $reference_id
                );
                //p($truck_images,true);
                $op_id = $this->admin_model->process_contact_form($data);
                $reference_id = "F".date("ymd")."00".$op_id;
                $update_data = array(
                        'id' => $op_id,
                        'reference_id' => $reference_id
                );
                $this->admin_model->update_contact_form($update_data); //update reference id 
                $data['reference_id'] = $reference_id;                
                if($op_id > 0) {
                        //echo "success";     
                        $mail_data = get_contact_maildata($data);                        
                        $mail_content = get_mail_template($mail_data);  
                        if(ENVIRONMENT == "development")                    
                                $to = "soorajsolutino@gmail.com";
                        else
                                $to = "webenquiries@wheelsahoy.com";
                        //Ref 1335 Sun May 26 16:30:10 GST 2019 | Enquiry Ref: 
                        $subject_time = get_subject_time();
                        $subject = "Ref ".$reference_id." ".$subject_time." GST ".date("Y");
                        
                        $this->sendMail($to, $subject, $mail_content, $truck_images);

                        //--------------- send auto reply to user ----------------
                                $mail_data_reply = get_reply_maildata($data);
                                $mail_content_reply = get_mail_template($mail_data_reply);
                                $to1 = $data['email'];
                                $subject_reply = "Ref ".$data['reference_id']." - Thank you for your interest - WheelsAhoy";
                                $this->sendMail($to1, $subject_reply, $mail_content_reply);
                        //--------------- send auto reply to user ----------------

                        sf('success_message', 'Thank you! We will get back to you soon.');
		        redirect("#contact");
                } else { 
                        //echo "failed";
                        sf('err_message', 'Sorry! Something went wrong, try again.');
		        redirect("#contact");
                }
        }


        function sendMail($to = "", $subject = "", $content = "", $attachments = array()){
                // Load PHPMailer library
                $this->load->library('phpmailer_lib');

                // PHPMailer object
                $mail = $this->phpmailer_lib->load();

                // SMTP configuration - TEST
                $mail->isSMTP();                
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'smtpwheelsahoy@gmail.com';
                $mail->Password = 'SMTPadmin123#';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $from_email = "info@wheelsahoy.com";
                $from_name = "Wheels Ahoy";

                $mail->setFrom($from_email, $from_name);
                //$mail->addReplyTo('info@example.com', 'CodexWorld');
                // Add a recipient
                $mail->addAddress($to);

                if(!empty($attachments)){
                        foreach($attachments as $file){
                                $path = 'assets/uploads/user-trucks/' . $file;//url('assets/uploads/user-trucks/' . $file);
                                $mail->addAttachment($path); 
                        }    
                }                   

                // Email subject
                $mail->Subject = $subject;

                // Set email format to HTML
                $mail->isHTML(true);

                // Email body content
                $mail->Body = $content;

                // Send email
                if (!$mail->send()) {                        
                        //echo $mail->ErrorInfo; exit;
                        return false;
                } else {
                        return true;
                }
        }
}
