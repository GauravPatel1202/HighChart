<?

$subset = ($_GET['subset'] ? $_GET['subset'] : false);


$csv = array();
if (($handle = fopen("results.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        // If subset and last $data is "no," skip it
        if ( $subset && $data[$num-1]=='No') continue;
        $data = implode ( ',' , $data );
        $csv[] = $data;
    }
    fclose($handle);
}

function csvToJson($csv) {
    $csvarr = array_map(function ($row) {
        $keys = array('highcharts', 'dataviz', 'javascript', 'cms', 'cms_other', 'attendance');
        $new_array = array_combine($keys, str_getcsv($row));
        $new_array['dataviz'] = unserialize($new_array['dataviz']);
        return $new_array;
    }, $csv);
    $json = json_encode($csvarr);

    return $json;
}

$json = csvToJson($csv);

header('Content-Type: application/json');
header('Cache-Control: no-cache');
echo $json;


?>