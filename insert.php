// Escape user inputs for security
$golfer = mysqli_real_escape_string($link, $_POST['golfer']);

$values = [];
foreach ($_POST['hole_score'] as $key => $score) {
    $score = trim(mysqli_real_escape_string($link, $score));
    if (!empty($score)) {
        $values[] = "('$golfer','$key','$score')";
    }
}

if (!empty($values)) {
    $values = implode (' , ', $values);

    // Attempt insert query execution
    $sql = "INSERT INTO scores (golfer, hole_num, hole_score) VALUES $values";
    mysqli_query($link, $sql);
}
// Close database connection
mysqli_close($link);

?>
