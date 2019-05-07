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
                //p($this->gen_contents['__story'], true);
                $this->template->write_view('content', 'index', $this->gen_contents);
                $this->template->render();
        }

        public function post_contact_form(){
                
                
                if(!empty($_FILES['truck_image']['name'])) {                                        
                        $config['upload_path']          = './assets/uploads/user-trucks/';
                        $config['allowed_types']        = 'jpg|png';
                        $config['encrypt_name'] = TRUE;
                        $this->load->library('upload', $config);
                        if ($this->upload->do_upload('truck_image')) {
                                $upload_detail = $this->upload->data();                        
                                $truck_image = $upload_detail["file_name"];
                        }
                }
                //p($this->input->post(),true);
                $data = array(
                        'name' => $this->input->post('name'),
                        'email' => $this->input->post('email'),
                        'phone' => $this->input->post('phone'),
                        'country' => $this->input->post('country'),
                        'message' => $this->input->post('message'),
                        'contact_for' => $this->input->post('contact_for'),
                        'truck_image'  => $truck_image
                );
                $op = $this->admin_model->process_contact_form($data);
                if($op) {
                        //echo "success";     
                        $mail_data = get_contact_maildata($data);                        
                        $mail_content = get_mail_content($mail_data);
                        //echo $mail_content; exit;
                        //$to = "soorajsolutino@gmail.com";
                        $to = "webenquiries@wheelsahoy.com";
                        $subject = "Received and enquiry from WheelsAhoy";
                        $this->sendMail($to, $subject, $mail_content);
                        sf('success_message', 'Thank you! We will get back to you soon.');
		        redirect("#contact");
                } else { 
                        //echo "failed";
                        sf('err_message', 'Sorry! Something went wrong, try again.');
		        redirect("#contact");
                }
        }


        function sendMail($to = "", $subject = "", $content = ""){
                // Load PHPMailer library
                $this->load->library('phpmailer_lib');

                // PHPMailer object
                $mail = $this->phpmailer_lib->load();

                // SMTP configuration
                $mail->isSMTP();                
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'soorajsolutino@gmail.com';
                $mail->Password = 'srjsolutino';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $from_email = "info@wheelsahoy.com";
                $from_name = "Wheels Ahoy";

                $mail->setFrom($from_email, $from_name);
                //$mail->addReplyTo('info@example.com', 'CodexWorld');

                // Add a recipient
                $mail->addAddress($to);

                // Add cc or bcc 
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');

                // Email subject
                $mail->Subject = $subject;

                // Set email format to HTML
                $mail->isHTML(true);

                // Email body content
                $mail->Body = $content;

                // Send email
                if (!$mail->send()) {                        
                        //echo $mail->ErrorInfo;
                        return false;
                } else {
                        return true;
                }
        }
}
