<?php
include("template/header.php");
if (isset($_GET['p'])) {
	if (isset($_SESSION['user_type'])) {
		if ($_SESSION['user_type'] == "Admin") {
			if ($_GET['p'] == "dashboard") {
				echo '<title>Dashboard | Informatics Admission System</title>';
				require_once 'template/dashboard.php';
			}
			if ($_GET['p'] == "year-level") {
				echo '<title>Manage Year Level | Informatics Admission System</title>';
				require_once 'template/yearlevel.php';
			}
			if ($_GET['p'] == "courses") {
				echo '<title>Manage Course/Strand | Informatics Admission System</title>';
				require_once 'template/courses.php';
			}
			if ($_GET['p'] == "assign-course") {
				echo '<title>Assign Course/Strand | Informatics Admission System</title>';
				require_once 'template/assign_courses.php';
			}
			if ($_GET['p'] == "student-admin") {
				echo '<title>Manage Student Admin/Registrar | Informatics Admission System</title>';
				require_once 'template/student_admin.php';
			}
			if ($_GET['p'] == "app-form") {
				echo '<title>Manage Student Information | Informatics Admission System</title>';
				require_once 'template/application_form.php';
			}
			if ($_GET['p'] == "requirements") {
				echo '<title>Manage Requirements | Informatics Admission System</title>';
				require_once 'template/requirements.php';
			}
			if ($_GET['p'] == "exam-results") {
				echo '<title>Examination Results | Informatics Admission System</title>';
				require_once 'template/exam_results.php';
			}
			if ($_GET['p'] == "evaluation") {
				echo '<title>Manage Evaluation | Informatics Admission System</title>';
				require_once 'template/evaluation.php';
			}
			if ($_GET['p'] == "manage-user") {
				echo '<title>Manage User | Informatics Admission System</title>';
				require_once 'template/users.php';
			}
			if ($_GET['p'] == "index") {
				echo '<title>Dashboard | Informatics Admission System</title>';
				require_once 'template/dashboard.php';
			} else {
				if (
					$_GET['p'] != "dashboard" &&
					$_GET['p'] != "courses" &&
					$_GET['p'] != "student-admin" &&
					$_GET['p'] != "app-form" &&
					$_GET['p'] != "requirements" &&
					$_GET['p'] != "manage-user" &&
					$_GET['p'] != "index" &&
					$_GET['p'] != "profile" &&
					$_GET['p'] != "evaluation" &&
					$_GET['p'] != "exam-results" &&
					$_GET['p'] != "year-level" &&
					$_GET['p'] != "assign-course"
				) {
					require_once 'template/404.php';
				}
			}
		} else {
			if ($_GET['p'] == "dashboard") {
				echo '<title>Dashboard | Informatics Admission System</title>';
				require_once 'template/dashboard.php';
			}
			if ($_GET['p'] == "app-form") {
				echo '<title>Manage Student Information | Informatics Admission System</title>';
				require_once 'template/application_form.php';
			}
			if ($_GET['p'] == "requirements") {
				echo '<title>Manage Requirements | Informatics Admission System</title>';
				require_once 'template/requirements.php';
			}
			if ($_GET['p'] == "evaluation") {
				echo '<title>Manage Evaluation | Informatics Admission System</title>';
				require_once 'template/evaluation.php';
			}
			if ($_GET['p'] == "index") {
				echo '<title>Dashboard | Informatics Admission System</title>';
				require_once 'template/dashboard.php';
			} else {
				if (
					$_GET['p'] != "dashboard" &&
					$_GET['p'] != "app-form" &&
					$_GET['p'] != "requirements" &&
					$_GET['p'] != "exam-results" &&
					$_GET['p'] != "index" &&
					$_GET['p'] != "evaluation"
				) {
					require_once 'template/404.php';
				}
			}
		}
	}
} else {
	require_once 'template/404.php';
}
include("template/footer.php");
