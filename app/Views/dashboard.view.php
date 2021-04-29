<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>HippiBank</title>
    <link rel="stylesheet" href="public/css/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1 class="title">HippiBank</h1>
    <a href="./create"><button>Add</button></a>
    <table style="width:100%">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phonenumber</th>
            <th>Risklevel</th>
            <th>Hypo-Paket</th>
            <th>Payback-Status</th>
            <th>Options</th>
        </tr>
        <?php foreach($customers as $customer): ?>
            <tr>
                <td><?= $customer->name ?></td>
                <td><?= $customer->email ?></td>
                <td><?= $customer->phone ?></td>
                <td><?= $risklevels[$customer->risklevelId]->name ?></td>
                <td><?= $mortgages[$customer->mortgageId]->package ?></td>
                <td>
                    <?php
                        $currentDateTime = new DateTime();
                        if ($customer->completed != 1 && strtotime($customer->finish) > strtotime($currentDateTime->format('Y-m-d'))) 
                        {
                            echo "💸";
                        }
                        else 
                        {
                            echo "🚨";
                        }
                    ?>
                </td>
                <td><p>Options</p></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>


<p><?php ?></p>

<script src="public/js/app.js"></script>
</body>
</html>
