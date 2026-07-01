<div class="container">
    <h1 class="text-center">Questions</h1>
    <div class="col-8">
    <?php
    include('./common/db.php');
    $query = "SELECT * FROM questions";
    $result = $conn->query($query);
    foreach($result as $row){
        echo "<div class='row question-list'>
        <h5><a href='#'>{$row['title']}</a></h5>
        </div>";
    }
    ?>
</div>
</div>