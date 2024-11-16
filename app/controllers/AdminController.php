<?php

require_once __DIR__ . '/../../vendor/tcpdf/tcpdf.php';

class AdminController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function exportToExcel() {
        $sql = "SELECT first_name, last_name, username, email FROM users";
        $stmt = $this->db->query($sql);
        $users = $stmt->fetchAll();

        $fileName = "users.csv";

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');

        $output = fopen('php://output', 'w');

        fputcsv($output, ['Keresztnév', 'Vezetéknév', 'Felhasználónév', 'Email']);

        foreach ($users as $user) {
            fputcsv($output, [
                $user['first_name'],
                $user['last_name'],
                $user['username'],
                $user['email']
            ]);
        }

        fclose($output);
    }

    public function exportToPDF() {
        $sql = "SELECT first_name, last_name, username, email FROM users";
        $stmt = $this->db->query($sql);
        $users = $stmt->fetchAll();

        $pdf = new TCPDF();
        $pdf->SetCreator('Web2 Beadandó');
        $pdf->SetAuthor('Adminisztrátor');
        $pdf->SetTitle('Felhasználói Lista');
        $pdf->SetHeaderData('', 0, 'Felhasználói Lista', 'Exportált felhasználók adatai');
        $pdf->setHeaderFont(['helvetica', '', 10]);
        $pdf->setFooterFont(['helvetica', '', 8]);
        $pdf->SetDefaultMonospacedFont('courier');
        $pdf->SetMargins(15, 20, 15);
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(10);
        $pdf->SetAutoPageBreak(TRUE, 20);
        $pdf->SetFont('helvetica', '', 12);
        $pdf->AddPage();

        $html = '<h1>Felhasználói Lista</h1>';
        $html .= '<table border="1" cellpadding="5">';
        $html .= '<tr>
                    <th>Keresztnév</th>
                    <th>Vezetéknév</th>
                    <th>Felhasználónév</th>
                    <th>Email</th>
                  </tr>';

        foreach ($users as $user) {
            $html .= '<tr>
                        <td>' . htmlspecialchars($user['first_name']) . '</td>
                        <td>' . htmlspecialchars($user['last_name']) . '</td>
                        <td>' . htmlspecialchars($user['username']) . '</td>
                        <td>' . htmlspecialchars($user['email']) . '</td>
                      </tr>';
        }

        $html .= '</table>';

        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output('users.pdf', 'D');
    }
}
