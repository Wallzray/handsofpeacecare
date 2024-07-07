
<?php

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require "functions.php";

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		// Sanitize and validate input data
		$name = filter_var(trim($_POST["name"]), FILTER_UNSAFE_RAW);
		$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
		$phone = filter_var(trim($_POST["phone"]), FILTER_UNSAFE_RAW);
		$service = filter_var(trim($_POST["service"]), FILTER_UNSAFE_RAW);
		$message = filter_var(trim($_POST["message"]), FILTER_UNSAFE_RAW);

		// Check if data is valid
		if (empty($name) || empty($email) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "Please fill in all fields correctly.";
			exit;
		}

		$official_name = "Hand of Peace";
		$official_email = "info@handofpeace.com";
		$official_phone = "+256 000 000 000";

		// Prepare placeholders and their replacements
		$placeholders_replacements = array(
			'{user_fullname}' => $name,
			'{user_email}' => $email,
			'{user_phone}' => $phone,
			'{user_service}' => $service,
			'{user_message}' => $message,
			'{official_email}' => $official_email,
			'{official_phone}' => $official_phone
		);

		$to = "mmmagezi@gmail.com";

		$email_result = sendEmail(
			"New message from website: " . $name, /* $email_subject */
			"contact_email_template.html", /* $email_template */
			$email, /* $sender_email */
			$name, /* $sender_name */
			$official_email, /* $receiver_email */
			$official_name, /* $receiver_name */
			$placeholders_replacements /* $placeholders_replacements */
		);

		// Check whether email was sent
		if (!$email_result['success']) {
			echo "Failed. Errors: ", $email_result['error'];
		} else {
			echo "<script>alert('Thank you for your message! We'll get back to you soon.');window.location.href='index.html'</script>";
		}
	}
?>
