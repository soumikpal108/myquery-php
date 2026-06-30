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
            <select id="category" name="category" class="form-control">
                <option value="">Mobile</option>
                <option value="">General</option>
                <option value="">Coding</option>
            </select>   
        </div>
        <div class="offset-sm-3 col-6">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>