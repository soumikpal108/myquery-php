<div class="container">
    <h1 class="text-center">Question Details</h1>
    <div class="col-6">
    <?php
    include("./common/db.php");
    $qid = isset($_GET['q-id']) ? $_GET['q-id'] : (isset($qid) ? $qid : null);
    // print_r($qid);
    $query = "SELECT * FROM questions WHERE id = $qid";
    $result = $conn->query($query);
    $row=$result->fetch_assoc();
    echo "<h4 class='mb-3 question-title'>Question: {$row['title']}</h4>
    <p class='mb-3'>{$row['description']}</p>";
    include("answers.php");
    ?>
    <form action="./server/requests.php" method="post">
        <input type="hidden" name="question_id" value="<?php echo $qid?>">
    <textarea name="answer" class="form-control mb-3" placeholder="Your answer..."></textarea>
    <button class="btn btn-primary">Write your answer</button>
    </form>    
    </div>
</div>