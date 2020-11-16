<h1 class="p-2 bg-blue-900 text-5xl text-center">Departures from <?= $locationName ?> (<?= $crs ?>)</h1>

<table class="w-full text-2xl">
    <thead>
    <tr>
        <th class="text-left p-2">Due</th>
        <th class="text-left p-2">ETD</th>
        <th class="text-left p-2">From</th>
        <th class="text-left p-2">To</th>
        <th class="text-left p-2">P</th>
        <th class="text-left p-2">Operator</th>
        <th class="text-left p-2">Service ID</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($response['GetStationBoardResult']['trainServices']['service'] ?: [] as $service) : ?>
        <tr>
            <td class="p-2"><?= $service['std'] ?></td>
            <td class="p-2 <?= $service['etd'] !== 'On time' ? 'text-red-500' : '' ?>"><?= $service['etd'] ?></td>
            <td class="p-2"><a href="/<?= $service['origin']['location']['0']['crs'] ?>"><?= $service['origin']['location']['0']['locationName'] ?></a></td>
            <td class="p-2"><a href="/<?= $service['destination']['location']['0']['crs'] ?>"><?= $service['destination']['location']['0']['locationName'] ?></a></td>
            <td class="p-2"><?= isset($service['platform']) ? $service['platform'] : '?' ?></td>
            <td class="p-2 <?= $service['operatorCode'] ?>"><?= $service['operator'] ?> (<?= $service['operatorCode'] ?>)</td>
            <td class="p-2"><a href="/<?= base64_encode($service['serviceID']) ?>"><?= $service['rsid'] ?> (<?= $service['serviceType'] ?>)</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php foreach ($messages ?: [] as $message) : ?>
    <p class="text-xl text-center p-2"><?php echo strip_tags(trim($message[0]['_']), 'a'); ?></p>
<?php endforeach; ?>