<?php
require_once ROOT_PATH . '/models/user.php';

class DashboardController
{
    private $userModel;
    private $db;

    public function __construct()
    {
        $this->userModel = new User();
        $database = Database::getInstance();
        $this->db = $database->getConnection();
    }

    public function index()
    {
        if (!isLoggedIn()) {
            prepareNotification("error", "Please log in to access the dashboard.");
            redirect(BASE_URL . 'login?dashboard_access=1');
            return;
        }

        $userData = $this->userModel->getUserById($_SESSION['user_id']);
        $userActivities = $this->getUserActivities($_SESSION['user_id'], 3);

        require_once ROOT_PATH . '/public/views/dashboard.php';
    }

    private function getUserActivities($userId, $limit = 5)
    {
        try {
            $stmt = $this->db->prepare("
                SELECT activity_type, ip_address, created_at
                FROM user_activities
                WHERE user_id = ?
                ORDER BY created_at DESC
                LIMIT ?
            ");
            $stmt->execute([$userId, $limit]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching user activities: " . $e->getMessage());
            return [];
        }
    }
}