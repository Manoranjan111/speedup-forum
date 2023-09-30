<div class="modal fade" id="addTopicModalLable" tabindex="-1" aria-labelledby="addTopicModalLable" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTopicModalLable">Add Topics</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/forum/partials/_handleAddTopic.php" method="post">
                    <div class="mb-3">
                        <label for="topicname" class="form-label">Heading</label>
                        <input type="text" class="form-control" name="topicname">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Topic Description</label>
                        <input type="text" class="form-control" name="description">
                    </div> 

                    <div class="mb-3">
                        <label for="formFile" class="form-label">image</label>
                        <input class="form-control" type="file" id="formFile" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary signup">Add Topic</button>
                </form>
            </div>
        </div>
    </div>
</div>