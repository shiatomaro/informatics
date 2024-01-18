<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Student Number</th>
            <th scope="col">Full Name</th>
            <th scope="col">Course</th>
            <th scope="col">Year Level</th>
            <th scope="col">Info</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($studentsData as $studNum => $studData) : ?>
            <tr>
                <th scope="row"><?php echo "$studNum" ?></th>
                <th><?php echo $studData['name']; ?></th>
                <th><?php echo $studData['course'] ?></th>
                <th><?php echo $studData['yrLvl'] ?></th>
                <td><a class="btn btn-primary d-inline" href=<?php echo "/system/students?studNum=$studNum" ?> role="button">info</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>