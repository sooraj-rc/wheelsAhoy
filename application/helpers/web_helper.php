<?php

function get_mail_content($mail_data = ''){
    $mail_content = '<!doctype html>
    <html>
      <head>
        <meta name="viewport" content="width=device-width">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Simple Transactional Email</title>
        <style>        
        @media only screen and (max-width: 620px) {
          table[class=body] h1 {
            font-size: 28px !important;
            margin-bottom: 10px !important;
          }
          table[class=body] p,
                table[class=body] ul,
                table[class=body] ol,
                table[class=body] td,
                table[class=body] span,
                table[class=body] a {
            font-size: 16px !important;
          }
          table[class=body] .wrapper,
                table[class=body] .article {
            padding: 10px !important;
          }
          table[class=body] .content {
            padding: 0 !important;
          }
          table[class=body] .container {
            padding: 0 !important;
            width: 100% !important;
          }
          table[class=body] .main {
            border-left-width: 0 !important;
            border-radius: 0 !important;
            border-right-width: 0 !important;
          }
          table[class=body] .btn table {
            width: 100% !important;
          }
          table[class=body] .btn a {
            width: 100% !important;
          }
          table[class=body] .img-responsive {
            height: auto !important;
            max-width: 100% !important;
            width: auto !important;
          }
        }        
        @media all {
          .ExternalClass {
            width: 100%;
          }
          .ExternalClass,
                .ExternalClass p,
                .ExternalClass span,
                .ExternalClass font,
                .ExternalClass td,
                .ExternalClass div {
            line-height: 100%;
          }
          .apple-link a {
            color: inherit !important;
            font-family: inherit !important;
            font-size: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
            text-decoration: none !important;
          }
          .btn-primary table td:hover {
            background-color: #34495e !important;
          }
          .btn-primary a:hover {
            background-color: #34495e !important;
            border-color: #34495e !important;
          }
        }
        </style>
      </head>
      <body class="" style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
        <table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
          <tr>
            <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
            <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
              <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">
    
                <!-- START CENTERED WHITE CONTAINER -->
                
                <table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">
    
                  <!-- START MAIN CONTENT AREA -->
                  <tr>
                    <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
<div style="text-align:center; margin:auto;"><img src="'.url('assets/img/logo-1.png').'" width="150" ></div>
                      <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                        <tr>
                          <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">

                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Hi there,</p>
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">'.$mail_data.'</p>
                            
                            
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Thank you! <br> Team Wheels Ahoy</p>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
    
                <!-- END MAIN CONTENT AREA -->
                </table>
    
                <!-- START FOOTER -->
                <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%;">
                  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                    <tr>
                      <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                        <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">
                        © Copyright '.date('Y').' Ahoy Middle East FZ LLC - All Rights Reserved
                      </span>                        
                      </td>
                    </tr>
                    <tr>
                      <td class="content-block powered-by" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                        
                      </td>
                    </tr>
                  </table>
                </div>
                <!-- END FOOTER -->
    
              <!-- END CENTERED WHITE CONTAINER -->
              </div>
            </td>
            <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
          </tr>
        </table>
      </body>
    </html>';
    return $mail_content;
}


function get_contact_maildata($data = array()){
    $mail_data = '<p>You have received an enquiry from WheelsAhoy.com</p>
    <p>The details showing here.</p>
    <table cellpadding="5">
    <tr>
        <td>Name: </td>
        <td>'.$data['name'].'</td>
    </tr>
    <tr>
        <td>Email: </td>
        <td>'.$data['email'].'</td>
    </tr>
    <tr>
        <td>Phone: </td>
        <td>'.$data['country'].'</td>
    </tr>
    <tr>
        <td>Country: </td>
        <td>'.$data['country'].'</td>
    </tr>
    <tr>
        <td>Contact Regarding: </td>
        <td>'.$data['contact_for'].'</td>
    </tr>
    <tr>
        <td>Message: </td>
        <td>'.$data['message'].'</td>
    </tr>
    <tr>
        <td>Date: </td>
        <td>'.date('d/m/Y').'</td>
    </tr>
    </table>
    <p>For more info, Please login to WheelsAhoy admin panel and check <a href"'.base_url().'admin">Click Here</a></p>';
    return $mail_data;
}