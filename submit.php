<?php
$conn = new mysqli("localhost", "root", "", "hopcare");

function sanitize_input($data){
    return htmlspecialchars(strip_tags(trim($data)));
}
$clientname= sanitize_input($_POST['username']);
$review= sanitize_input($_POST['review_text']);

$spam= ['cocaine','bad','click here', 'visit my site'];
function is_spam($review, $spam){
    foreach($spam as $keyword){
        if(stripos($review, $keyword) !== false){
            return true;
        }
    }
    return false;
}
if(is_spam($review,$spam)){
    die('Your review contains spam words and cannot be submitted.');
}
$sql= "INSERT into reviews(client, review_text) VALUES('$clientname','$review')";
if($conn->query($sql)==TRUE){
    echo "<script>alert('Your review has been submitted.'); window.location.href='reviews.php';</script>";
}
else{
    echo "Error: ". $conn->error;
}