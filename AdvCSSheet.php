<!DOCTYPE html>
<html lang="EN">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" media="all" href="./AdvSelectorLesson.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">
</head>
    <body>
        <table class="tabular-data">
            <thead>
            <tr>
                <td colspan="3">CSS3 Elements  
                    <div class="button">
                        <script type="text/javascript" language="JavaScript" src="../Javascript/find5.js"></script>
                    </div>
                </td>
            </tr>
            <tr>
            <th>Example</th>
            <th>Classification</th>
            <th>Explanation</th>
            </tr>
            </thead>
            <tbody>
                <?php 
                    error_reporting(0);
                    $array = $fields = array(); $i=0;
                    $handle = @fopen('./CSS3dataList.txt','r');
                    //To add elements, just copy and paste comma seperated elemnts into CSS3dataList.txt
                    
                    if ($handle) {
                        while (($row = fgetcsv($handle, 4096, ',')) !== false) {
                            if (empty($fields)) {
                                $fields = $row;
                                continue;
                            }
                        
                            foreach ($row as $k=>$value) {
                                $array[$i][$fields[$k]] = $value;
                            }
                            $i++;
                        }

                        if (!feof($handle)) {
                            echo "Error: unexpected fgets() fail\n";
                        }
                        fclose($handle);
                    }
                    $columns = array_column($array,'Example');
                    array_multisort($columns, SORT_ASC, $array);

                    for($x=0;$x < count($array); $x++){
                        echo '<tr><td data-title="Example"><code>'.$array[$x]['Example'].'</code></td><td data-title="Description">'.$array[$x]['Description'].'</td><td data-title="Explanation">'.$array[$x]['Explanation'].'</td></tr>';                 
                    }

                
                ?>
            </tbody>
            </table>
        </body>
</html>