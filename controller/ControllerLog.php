<?php

RequirePage::model('ModelLogBook');
RequirePage::library('Validation');

class ControllerLogBook extends Controller
{
    public function index()
    {
        $logBookModel = new ModelLogBook();
        $logEntries = $logBookModel->select();

        return Twig::render('logbook/index.php', ['logEntries' => $logEntries]);
    }

    public function logDatabaseAction($userId, $action, $tableName)
    {
        $logBookModel = new ModelLogBook();
        $data = [
            'user_id' => $userId,
            'action' => $action,
            'table_name' => $tableName,
        ];

        $logBookModel->insert($data);
    }
}
