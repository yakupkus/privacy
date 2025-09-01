<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// POST verisini al
$data = json_decode(file_get_contents("php://input"), true);
$institutionId = $data['institution_id'] ?? 1; // Varsayılan 1. kurum

// Kurumlara göre farklı veri setleri
$mealsData = [
    1 => [
        [
            "date" => "2025-08-28",
            "meals" => ["EZOGELİN ÇORBASI", "PÜRELİ ROSTO KÖFTE", "SOSLU SPAGETTİ MAKARNA","CACIK"],
            "totalCalories" => 948,
            "price" => 0.00
        ],
        [
            "date" => "2025-08-29",
            "meals" => ["GEMİCİ ÇORBASI", "PİDE ÜZERİ TAVUK DÖNER (GARNİTÜRLÜ)", "PİRİNÇ PİLAVI","AYRAN"],
            "totalCalories" => 999,
            "price" => 0.00
        ]
    ],
    2 => [
        [
            "date" => "2025-05-13",
            "meals" => ["Sebze Çorbası", "Kuskus", "Balık"],
            "totalCalories" => 0,
            "price" => 0.00
        ]
    ]
];

$response = $mealsData[$institutionId] ?? [];
http_response_code(200);
echo json_encode($response);
?> 