<?php
include 'connect.php';
$conn = OpenCon();
$sql = "SELECT * FROM animals";
$result = $conn->query($sql);

// nav bar
echo "
<link rel='stylesheet' href='styles.css?version=2'>
<ul class='nav-list'>
    <li class='nav-item'><a class='nav-link' href='index.php'>Dashboard</a></li>
    <li class='nav-item'><a class='nav-link' href='sections.php'>Sections</a></li>
    <li class='nav-item'><a class='nav-link' href='enclosures.php'>Enclosures</a></li>
    <li class='nav-item'><a class='nav-link clicked' href='Animals.php'>Animals</a></li>
    <li class='nav-item'><a class='nav-link' href='events.php'>Events</a></li>
    <li class='nav-item'><a class='nav-link' href='guest.php'>Guests</a></li>
    <li class='nav-item'><a class='nav-link' href='employees.php'>Employees</a></li>
</ul> 
<h1>Animals:</h1>
";

if ($result->num_rows > 0) {
    echo "
    <table class='table-style'>
    <thead>
        <tr>
            <th class='border-class'>Animal ID</th>
            <th class='border-class'>Given Name</th>
            <th class='border-class'>Sex</th>
            <th class='border-class'>Weight</th>
            <th class='border-class'>Birthday</th>
            <th class='border-class'>Enclosure Num</th>
            <th class='border-class'>Section</th>
            <th class='border-class'>Species</th>
            <th class='border-class'>Genus</th>
        </tr>
    </thead>
    <tbody>
    ";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "
            <tr>
                <td class='border-class'>".$row["AnimalID"]."</td>
                <td class='border-class'>".$row["GivenName"]."</td>
                <td class='border-class'>".$row["Sex"]."</td>
                <td class='border-class'>".$row["Weight"]."</td>
                <td class='border-class'>".$row["DateBorn"]."</td>
                <td class='border-class'>".$row["EnclosureNum"]."</td>
                <td class='border-class'>".$row["SectionName"]."</td>
                <td class='border-class'>".$row["Species"]."</td>
                <td class='border-class'>".$row["Genus"]."</td>
            </tr>
        ";
    }
    echo "
    </tbody>
    </table>";
} else {
    echo "0 results";
}
echo "<br><a class='form-link' href='AddAnimalForm.php'>Add Animal</a>";
CloseCon($conn);
?>
