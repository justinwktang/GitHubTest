<?php
$link = mysql_connect('jkrwriter.db.8380560.hostedresource.com', 'jkrwriter', 'JKRjkr123');
$db_selected = mysql_select_db('jkrwriter', $link);
if(isset($_REQUEST["submit"]) && $_REQUEST["submit"] == "Submit")
{
	
	$uid = $_REQUEST["user"];
	$query_insert = "INSERT INTO story_entries (story_id, user_id, story_entry) VALUES(1,$uid,'".$_REQUEST["story_field"]."')";
	$insert_result = mysql_query($query_insert);
}

$query1 = "SELECT * FROM story WHERE story_id=1";
$result1 = mysql_query($query1);
$title_row = mysql_fetch_assoc($result1);
$title = $title_row["title"];

$query2 = "SELECT * FROM users, story_entries WHERE story_entries.user_id = users.user_id ORDER BY date_written ASC";
$result = mysql_query($query2);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $title; ?></title>
</head>

<body>
<h1><?php echo $title; ?></h1>
<?php
while($row = mysql_fetch_assoc($result))
{
	echo "(".$row["name"].") ".$row["story_entry"]."<br />";
}
?>

<br /><br />
<form name="new_story" action="/write_beta/index.php" method="post">
	My name is:<br />
    <select name="user">
    	<option value="1">Khai</option>
    	<option value="2">Justin</option>
    	<option value="3">Robert</option>
    </select><br /><br />
    Continue the story:
    <br />
    <textarea name="story_field"></textarea>
    <br />
    <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>
