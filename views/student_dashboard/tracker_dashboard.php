<!-- I didn't want to touch the database, this is just for referwnce -->
<div class="container">
        <h1>Admin Dashboard</h1>
        <a href="logout_action.php">Logout</a>

        <h2>Admission Applications</h2>
        <table>
            <thead>
                <tr>
                    <th>Application ID</th>
                    <th>User ID</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($applications as $application) : ?>
                    <tr>
                        <td><?= $application['id']; ?></td>
                        <td><?= $application['user_id']; ?></td>
                        <td><?= $application['status']; ?></td>
                        <!-- Add more columns as needed -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

