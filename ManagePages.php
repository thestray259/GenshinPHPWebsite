<?php
$myHeader = "Page Manager";
include_once "MyHeader.php";

// Use this page to change the value of a page
if($_SESSION["isAdmin"] == 0) {
    header("Location: Login.php");
    exit();
}

?>

<form>
    <label for="title">Title</label>
    <input type="text" id="title" name="title" placeholder="Enter Title" />


    <label for="header">Header</label>
    <input type="text" id="header" name="header" placeholder="Enter Header" />

    <label for="contents">Contents</label>
    <textarea type="text" id="contents" name="contents" placeholder="Page Contents Here" style="height:200px"></textarea>

    <input type="submit" value="Create Page" />
</form>

<br />
<br />

</li>
<br />

<?php
//My sugestion: Create a Table that lists all the pages (records) in the database. Each record will have an Edit and Delete link.
//Each link takes the person to a page where they can edit the content
include_once "MyHeader.php";
?>

