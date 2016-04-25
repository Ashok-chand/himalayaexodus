<?php

//Search for the Activities
add_action('wp_ajax_nopriv_booking', 'booking'); // for not logged in users
add_action('wp_ajax_booking', 'booking');

function booking() {

    require_once(ABSPATH . '/wp-includes/class-phpmailer.php');
    $phpmailer = new PHPMailer();

    global $wpdb;
    $html = '';
    $fullname = $_POST['name'];
    $birth_day = $_POST['birth_day'];
    $passport = $_POST['passport'];
    $email = $_POST['email'];
    $nationality = $_POST['nationality'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    $no_traveller = $_POST['no_traveller'];
    $message = $_POST['message'];
    $word_verify = $_POST['word_verify'];

    $post_7 = get_post($_POST['post_id']);
    $title = $post_7->post_title;
    $admin_email = get_option('admin_email');

    if ($_POST['subscribe'] == '1') {
        $user_data = array(
            'email' => $email
        );

        $data_subscriber = array(
            'user' => $user_data,
            'user_list' => array('list_ids' => array(1))
        );

        $helper_user = WYSIJA::get('user', 'helper');
        $helper_user->addSubscriber($data_subscriber);
        //this function will add the subscriber to mailpoet
    }
    $email_subject = "BOOKING Himalayan Exodus Treks & Tours";
    $headers = 'From: ' . $fullname . ' <' . $email . '>' . "\r\n";
    // separate the users array
    $send_to = $admin_email;
    // concatenate a message together
    $message = '';
    $message .= '<html>';
    $message .= '<title>' . $email_subject . '</title>';
    $message .= '<body>';

    $message .= '<table width="115" align="left" border="0" cellpadding="0" cellspacing="0">
        <tr>
        <td height="115" style="padding: 0 20px 20px 0;">
         
        </td>
      </tr>
    </table>
    <!--[if (gte mso 9)|(IE)]>
      <table width="380" align="left" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <td>
    <![endif]-->
    <table class="col380" align="left" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 380px;">  
      <tr>
        <td>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="bodycopy">Full Name:</td>
            <td>' . $fullname . ' </td>
          </tr>
          <tr>
            <td class="bodycopy">Birth day</td>
            <td>' . $birth_day . ' </td>
          </tr
          <tr>
            <td class="bodycopy">Passport</td>
            <td>' . $passport . ' </td>
          </tr>
           <tr>
            <td class="bodycopy">E-mail</td>
            <td>' . $email . ' </td>
          </tr>
          
          <tr>
            <td class="bodycopy">Nationality</td>
            <td>' . $nationality . ' </td>
          </tr>
          <tr>
            <td class="bodycopy">State </td>
            <td>' . $state . ' </td>
          </tr>
          <tr>
            <td class="bodycopy">City</td>
            <td>' . $city . ' </td>
          </tr>
          
          <tr>
            <td class="bodycopy">Phone</td>
            <td>' . $phone . ' </td>
          </tr>
          <tr>
            <td class="bodycopy">Date From</td>
            <td>' . $from_date . ' </td>
          </tr>
          <tr>
            <td class="bodycopy">Date To</td>
            <td>' . $to_date . ' </td>
          </tr>
          <tr>
            <td class="bodycopy">No of Traveller</td>
            <td>' . $no_traveller . ' </td>
          </tr>
          <tr>
             <td class="bodycopy">Message</td>
            <td>' . $message . ' </td>
          </tr>
            
            <tr>
              <td style="padding: 20px 0 0 0;">
                <table class="buttonwrapper" bgcolor="#e05443" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="button" height="45">
                     
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <!--[if (gte mso 9)|(IE)]>
          </td>
        </tr>
    </table>
    <![endif]-->
  </td>
</tr>';

    $message .= '</body>';
    $message .= '</html>';
    $from = $email;
    $email_subject = "BOOKING Himalayan Exodus Treks & Tours";
    $phpmailer->IsSMTP();
    $phpmailer->SMTPAuth = true;
    $phpmailer->Host = "mail.crossovernepal.com";
    $phpmailer->Port = 26;
    $phpmailer->Username = "rupesh@crossovernepal.com";
    $phpmailer->Password = "rupesh_123";
    $phpmailer->SetFrom($from, 'Himalayan Exodus');
    $phpmailer->Subject = $email_subject;
    $phpmailer->MsgHTML($message);
    $phpmailer->AddAddress($admin_email, $fullname);
    if ($phpmailer->Send()) {
        echo "Message sent!";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

    wp_reset_query();
    die;
}
