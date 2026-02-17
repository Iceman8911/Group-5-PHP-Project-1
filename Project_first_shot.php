<?php
// We use a query parameter 'page' to tell PHP which content to load.
// If 'page' is not set in the URL, we default to 'home'.
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// --- DATA & LOGIC SECTION ---

// 1. Group Members Data (Used for Home, GPA, and Details tabs)
$group_members = [
    [
        "matric" => "22/0240", 
        "name" => "Okochi-Thompson Obarido", 
        "courses" => ["CSC101 - Intro to CS", "MTH101 - General Math"],
        "gpa_data" => ["points" => 45, "units" => 10], // 4.5 GPA
        "blood" => "O+", "state" => "Lagos", "phone" => "08012345678", "hobbies" => "Coding, Reading"
    ],
    [
        "matric" => "MAT102", 
        "name" => "Bob Smith", 
        "courses" => ["CSC101 - Intro to CS", "PHY101 - General Physics"],
        "gpa_data" => ["points" => 32, "units" => 10], // 3.2 GPA
        "blood" => "A-", "state" => "Abuja", "phone" => "08087654321", "hobbies" => "Gaming, Football"
    ],
    [
        "matric" => "MAT102", 
        "name" => "Bob Smith", 
        "courses" => ["CSC101 - Intro to CS", "PHY101 - General Physics"],
        "gpa_data" => ["points" => 32, "units" => 10], // 3.2 GPA
        "blood" => "A-", "state" => "Abuja", "phone" => "08087654321", "hobbies" => "Gaming, Football"
    ],
    [
        "matric" => "MAT102", 
        "name" => "Bob Smith", 
        "courses" => ["CSC101 - Intro to CS", "PHY101 - General Physics"],
        "gpa_data" => ["points" => 32, "units" => 10], // 3.2 GPA
        "blood" => "A-", "state" => "Abuja", "phone" => "08087654321", "hobbies" => "Gaming, Football"
    ],
    [
        "matric" => "MAT102", 
        "name" => "Bob Smith", 
        "courses" => ["CSC101 - Intro to CS", "PHY101 - General Physics"],
        "gpa_data" => ["points" => 32, "units" => 10], // 3.2 GPA
        "blood" => "A-", "state" => "Abuja", "phone" => "08087654321", "hobbies" => "Gaming, Football"
    ],
    [
        "matric" => "MAT102", 
        "name" => "Bob Smith", 
        "courses" => ["CSC101 - Intro to CS", "PHY101 - General Physics"],
        "gpa_data" => ["points" => 32, "units" => 10], // 3.2 GPA
        "blood" => "A-", "state" => "Abuja", "phone" => "08087654321", "hobbies" => "Gaming, Football"
    ],
    [
        "matric" => "MAT102", 
        "name" => "Bob Smith", 
        "courses" => ["CSC101 - Intro to CS", "PHY101 - General Physics"],
        "gpa_data" => ["points" => 32, "units" => 10], // 3.2 GPA
        "blood" => "A-", "state" => "Abuja", "phone" => "08087654321", "hobbies" => "Gaming, Football"
    ],
    [
        "matric" => "MAT102", 
        "name" => "Bob Smith", 
        "courses" => ["CSC101 - Intro to CS", "PHY101 - General Physics"],
        "gpa_data" => ["points" => 32, "units" => 10], // 3.2 GPA
        "blood" => "A-", "state" => "Abuja", "phone" => "08087654321", "hobbies" => "Gaming, Football"
    ],
    [
        "matric" => "MAT102", 
        "name" => "Bob Smith", 
        "courses" => ["CSC101 - Intro to CS", "PHY101 - General Physics"],
        "gpa_data" => ["points" => 32, "units" => 10], // 3.2 GPA
        "blood" => "A-", "state" => "Abuja", "phone" => "08087654321", "hobbies" => "Gaming, Football"
    ],
    [
        "matric" => "MAT103", 
        "name" => "Charlie Brown", 
        "courses" => ["GST101 - Use of English", "CSC102 - Intro to Web"],
        "gpa_data" => ["points" => 38, "units" => 10], // 3.8 GPA
        "blood" => "B+", "state" => "Rivers", "phone" => "08055555555", "hobbies" => "Music, Traveling"
    ]
];

// 2. Payroll Logic (Generates 50 dummy employees)
$employees = [];
for ($i = 1; $i <= 50; $i++) {
    // Generate random hours and rate for demo purposes
    $hours = rand(20, 160); 
    $rate = rand(500, 2000); 
    $deduction = rand(1000, 5000);
    
    // Calculate Gross and Net Pay
    $gross = $hours * $rate;
    $net = $gross - $deduction;
    
    // If net is negative (deduction too high), reset to 0
    if ($net < 0) $net = 0;

    $employees[] = [
        "id" => "EMP" . str_pad($i, 3, "0", STR_PAD_LEFT),
        "name" => "Employee " . $i,
        "hours" => $hours,
        "rate" => $rate,
        "deduction" => $deduction,
        "gross" => $gross,
        "net" => $net
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Project PHP</title>
    <style>
        /* Basic CSS to make the site look "beautiful" as requested */
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px; }
        .nav-bar { background-color: #333; overflow: hidden; border-radius: 5px; margin-bottom: 20px; }
        .nav-bar a { float: left; display: block; color: white; text-align: center; padding: 14px 16px; text-decoration: none; }
        .nav-bar a:hover { background-color: #ddd; color: black; }
        .nav-bar a.active { background-color: #04AA6D; color: white; }
        .content { background-color: white; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #04AA6D; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .card { border: 1px solid #ddd; padding: 15px; margin-bottom: 10px; border-radius: 5px; background: #fafafa; }
        h2 { color: #333; border-bottom: 2px solid #04AA6D; padding-bottom: 5px; }
        .label { font-weight: bold; color: #555; }
    </style>
</head>
<body>

    <div class="nav-bar">
        <a href="?page=home" class="<?php echo $page == 'home' ? 'active' : ''; ?>">Home</a>
        <a href="?page=payroll" class="<?php echo $page == 'payroll' ? 'active' : ''; ?>">Payroll</a>
        <a href="?page=gpa" class="<?php echo $page == 'gpa' ? 'active' : ''; ?>">GPA Calculator</a>
        <a href="?page=details" class="<?php echo $page == 'details' ? 'active' : ''; ?>">Personal Details</a>
    </div>

    <div class="content">
        <?php
        // We use a Switch statement to show different content based on the 'page' variable
        switch ($page) {

            // --- TAB 1: HOME PAGE ---
            case 'home':
                echo "<h2>Group Members & Courses</h2>";
                echo "<p>Welcome to our group home page.</p>";
                
                foreach ($group_members as $member) {
                    echo "<div class='card'>";
                    // Requirement: Matric Number, Name, Courses
                    echo "<p><span class='label'>Matric Number:</span> {$member['matric']}</p>";
                    echo "<p><span class='label'>Name of Student:</span> {$member['name']}</p>";
                    echo "<p><span class='label'>Courses Registered:</span></p>";
                    echo "<ul>";
                    foreach ($member['courses'] as $course) {
                        echo "<li>$course</li>";
                    }
                    echo "</ul>";
                    echo "</div>";
                }
                break;

            // --- TAB 2: PAYROLL ---
            case 'payroll':
                echo "<h2>Company Payroll (50+ Employees)</h2>";
                echo "<p>Calculated as: Wages = (Hours × Rate) - Deduction</p>";
                
                echo "<table>";
                echo "<thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Hours</th>
                            <th>Rate</th>
                            <th>Deduction</th>
                            <th>Gross Pay</th>
                            <th>Net Pay</th>
                        </tr>
                      </thead>";
                echo "<tbody>";
                
                // Requirement: Compute wages and list gross/net pay
                foreach ($employees as $emp) {
                    echo "<tr>";
                    echo "<td>{$emp['id']}</td>";
                    echo "<td>{$emp['name']}</td>";
                    echo "<td>{$emp['hours']}</td>";
                    echo "<td>$" . number_format($emp['rate']) . "</td>";
                    echo "<td>$" . number_format($emp['deduction']) . "</td>";
                    echo "<td><strong>$" . number_format($emp['gross']) . "</strong></td>";
                    echo "<td><strong>$" . number_format($emp['net']) . "</strong></td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                break;

            // --- TAB 3: GPA CALCULATOR ---
            case 'gpa':
                echo "<h2>1st Semester GPA Results</h2>";
                echo "<table>";
                echo "<tr><th>Name</th><th>Total Points</th><th>Total Units</th><th>GPA</th></tr>";
                
                foreach ($group_members as $member) {
                    // Logic: GPA = Total Points / Total Units
                    $points = $member['gpa_data']['points'];
                    $units = $member['gpa_data']['units'];
                    $gpa = ($units > 0) ? ($points / $units) : 0;
                    
                    echo "<tr>";
                    echo "<td>{$member['name']}</td>";
                    echo "<td>$points</td>";
                    echo "<td>$units</td>";
                    echo "<td><strong>" . number_format($gpa, 2) . "</strong></td>";
                    echo "</tr>";
                }
                echo "</table>";
                break;

            // --- TAB 4: PERSONAL DETAILS ---
            case 'details':
                echo "<h2>Personal Details</h2>";
                
                foreach ($group_members as $member) {
                    echo "<div class='card'>";
                    // Requirement: Name, Blood, State, Phone, Hobbies
                    echo "<h3>{$member['name']}</h3>";
                    echo "<p><span class='label'>Blood Group:</span> {$member['blood']}</p>";
                    echo "<p><span class='label'>State of Origin:</span> {$member['state']}</p>";
                    echo "<p><span class='label'>Phone Number:</span> {$member['phone']}</p>";
                    echo "<p><span class='label'>Hobbies:</span> {$member['hobbies']}</p>";
                    echo "</div>";
                }
                break;

            default:
                echo "<p>Page not found.</p>";
        }
        ?>
    </div>

</body>
</html>