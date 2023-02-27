<html>
    <head>
        <meta name="robots" content="index, follow">
        <link rel="icon" href="<?php echo base_url()."/assets/images/top10.png";?>">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
        <title>Top 10 richest people in the world, top Billionaires</title>
        <meta property="og:title" content="Top 10 richest people in the world, top Billionaires">
        <meta property="og:url" content="<?php echo base_url()."/demo";?>">
        <meta property="og:description" content="Top 10 richest people in the world, top Billionaires ,  <?php
                        foreach($response as $data)
                        {
                           echo $data->person->name;
                           echo ",";
                        }
                        ?> ">
        <meta property="og:image" content="<?php echo  base_url(); ?>assets/images/qlukYVNE.png?>">
        <meta name="description" content="Top 10 richest people in the world, top Billionaires ,  <?php
                        foreach($response as $data)
                        {
                           echo $data->person->name;
                           echo ",";
                        }
                        ?> "/>
        <link rel="canonical" href="<?php echo base_url()."/demo";?>" />
    </head>
    <body>
        <h1>Top 10 richest people in the world, top Billionaires</h1>
        <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Rank</th>
                        <th scope="col">Name</th>
                        <th scope="col">NetWorth</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Residence</th>
                        <th scope="col">Source</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $c=0;
                        foreach($response as $data)
                        {
                        ?>
                    <tr>
                        <th scope="row">
                            <img
                                src="<?php echo @$data->person->squareImage; ?>"
                                class="rounded float-left"
                                alt="<?php echo @$data->person->name; ?>"
                                width="100"
                                height="100"
                            />
                            <!--<img-->
                            <!--    src="<?php echo @$data->person->squareImage; ?>?background=000000&amp;cropX1=524&amp;cropX2=1824&amp;cropY1=185&amp;cropY2=1486"-->
                            <!--    src="<?php echo @$data->person->squareImage; ?>?background=000000&amp;cropX1=524&amp;cropX2=1824&amp;cropY1=185&amp;cropY2=1486"-->
                            <!--    class="rounded float-left"-->
                            <!--    alt="profile"-->
                            <!--    width="100"-->
                            <!--    height="100"-->
                            <!--/>-->
                        </th>
                        <td><span class="shift badge badge-pill badge-info" style="font-size: 18px;"><?php echo ++$c;?></span></td>
                        <td class="bold"><?php echo @$data->person->name; ?></td>
                        <td class="bold">$<?php echo @$data->finalWorth; ?></td>
                        <td class="bold"><?php echo @$data->gender; ?></td>
                        <td class="bold"><?php echo @$data->countryOfCitizenship; ?></td>
                        <td class="bold"><?php echo @$data->financialAssets[0]->companyName; ?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>

        </body>
</html>
<style>
    body {
    background-color: #f7f9f9;
}
.navbar-brand {
    font-size: 30px;
}
.shift {
    margin-left: 7px;
}
.shadow {
    -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.border-bottom {
    border: 1px solid #000;
}
.bold {
    font-weight: 700;
}
.show-loader {
    border: 16px solid #f3f3f3;
    border-top: 16px solid #273746;
    border-radius: 50%;
    width: 100px;
    height: 100px;
    margin-top: 6%;
    margin-left: 42vw;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
}
@-webkit-keyframes spin {
    0% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    to {
        -webkit-transform: rotate(1turn);
        transform: rotate(1turn);
    }
}
@keyframes spin {
    0% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    to {
        -webkit-transform: rotate(1turn);
        transform: rotate(1turn);
    }
}

</style>