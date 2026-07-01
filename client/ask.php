<div class="container">
    <h1 class="text-center">Ask A Question</h1>

    <form action="./server/requests.php" method="post">
        <div class="offset-sm-3 col-6 mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Enter question">
        </div>
        <div class="offset-sm-3 col-6 mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" id="description" name="description" class="form-control" placeholder="Enter text"></textarea>
        </div>
        <div class="offset-sm-3 col-6 mb-3">
            <label for="category" class="form-label">Category</label>
            <?php include("category.php"); ?>
        </div>
        <div class="offset-sm-3 col-6">
            <button type="submit" name="ask" class="btn btn-primary">Ask Question</button>
        </div>
    </form>
</div>