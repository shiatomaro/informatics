<div class="container">
    <h1>Create a new course</h1>
    <form method="post" action="actions/create_course_action.php">
        <div class="input-group mb-3">
            <span class="input-group-text">Course Code</span>
            <input type="text" class="form-control" aria-label="Course Code" placeholder="C101" name="course_code">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Course Name</span>
            <input type="text" class="form-control" aria-label="Course Name" placeholder="Course Name" name="course_name">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Course Description</span>
            <textarea class="form-control" name="course_desc" aria-label="Course Description" rows="3" placeholder="This course is about..."></textarea>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Course Status</span>
            <select class="form-control" name="course_status" aria-label="Course Status">
                <option value="open">Open</option>
                <option value="closed">Closed</option>
            </select>
        </div>
        <div class="d-flex justify-content-end">
            <a class="btn btn-secondary" href="/system/courses" role="button">Back</a>
            <button type="submit" class="btn btn-primary ms-2">Create</button>
        </div>
    </form>
</div>