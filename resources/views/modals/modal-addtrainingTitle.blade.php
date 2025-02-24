<div class="modal fade" id="modal-addtrainingtitle">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Training</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('formCreate') }}" method="post" id="addTitleForm">
                @csrf

                <div class="modal-body">
                    <div class="form-group">
                        <div class='form-row'>
                            <div class="col-md-12">
                                <label>Training Title:</label>
                                <input type="text" name="title" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class='form-row'>
                            <div class="col-md-12">
                                <label>Speaker/Trainers:</label>
                                <input type="text" name="speaker" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class='form-row'>
                            <div class="col-md-6">
                                <label>Date:</label>
                                <input type="date" name="training_date" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-6">
                                <label>Venue:</label>
                                <input type="text" name="training_venue" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>     
    </div>   
</div>