<?php
    function TableOut($last, $TITLE, $HW1, $HW2)
    {
        if(is_numeric($HW1) && is_numeric($HW2))
        {
            if($HW1 != 0 && $HW2 != 0)
            {
                if($TITLE == "SLI Support")
                {
                    if($HW1 < $HW2)
                    {
                        $out = "
                        <tr>
                            <td>
                            </td>
                            <td class='text-center'>  
                            </td>
                            <td class='text-center'>
                                <h1 class='text-success fs-5 mb-0 pt-3'>Better</h1>
                            </td>
                        </tr>";
                    }

                    else if($HW1 > $HW2)
                    {
                        $out = "
                        <tr>
                            <td>
                            </td>
                            <td class='text-center'>  
                                <h1 class='text-success fs-5 mb-0 pt-3'>Better</h1>
                            </td>
                            <td class='text-center'>                          
                            </td>
                        </tr>";
                    }

                    else if($HW1 = $HW2)
                    {
                        $out = "
                        <tr>
                            <td>
                            </td>
                            <td class='text-center'>  
                            </td>
                            <td class='text-center'>                          
                            </td>
                        </tr>";
                    }
                }

                if($TITLE == "Price")
                {
                        if($HW1 > $HW2)
                        {
                            $out = "
                            <tr>
                                <td>
                                </td>
                                <td class='text-center'>  
                                </td>
                                <td class='text-center'>
                                    <h1 class='text-success fs-5 mb-0 pt-3'>Cheaper</h1>
                                </td>
                            </tr>";
                        }

                        else if($HW1 < $HW2)
                        {
                            $out = "
                            <tr>
                                <td>
                                </td>
                                <td class='text-center'>  
                                    <h1 class='text-success fs-5 mb-0 pt-3'>Cheaper</h1>
                                </td>
                                <td class='text-center'>                          
                                </td>
                            </tr>";
                        }

                        else if($HW1 = $HW2)
                        {
                            $out = "
                            <tr>
                                <td>
                                </td>
                                <td class='text-center'>  
                                </td>
                                <td class='text-center'>                          
                                </td>
                            </tr>";
                        }
                
                    else
                    {
                        $out = "
                        <tr>
                            <td>
                            </td>
                            <td class='text-center'>  
                            </td>
                            <td class='text-center'>                          
                            </td>
                        </tr>";
                    }
                }


                else if($TITLE == "Cooler Included")
                {
                    if($HW1 < $HW2)
                    {
                        $out = "
                        <tr>
                            <td>
                            </td>
                            <td class='text-center'>  
                            </td>
                            <td class='text-center'>
                                <h1 class='text-success fs-5 mb-0 pt-3'>Better</h1>
                            </td>
                        </tr>";
                    }

                    else if($HW1 > $HW2)
                    {
                        $out = "
                        <tr>
                            <td>
                            </td>
                            <td class='text-center'>  
                                <h1 class='text-success fs-5 mb-0 pt-3'>Better</h1>
                            </td>
                            <td class='text-center'>                          
                            </td>
                        </tr>";
                    }

                    else if($HW1 = $HW2)
                    {
                        $out = "
                        <tr>
                            <td>
                            </td>
                            <td class='text-center'>  
                            </td>
                            <td class='text-center'>                          
                            </td>
                        </tr>";
                    }

                }

                else if($HW1 < $HW2)
                {
                    $mempercent = $HW2/$HW1*100;
                    $num = round($mempercent, 2);
                    
                    $out = "
                    <tr>
                        <td>
                        </td>
                        <td class='text-center'>  
                        </td>
                        <td class='text-center'>
                            <h1 class='text-success fs-5 mb-0 pt-3'>+$num%</h1>
                        </td>
                    </tr>";
                }
        
                else if($HW1 > $HW2)
                {
                    $mempercent = $HW1/$HW2*100;
                    $num = round($mempercent, 2);
                    
                    $out = "
                    <tr>
                        <td>
                        </td>
                        <td class='text-center'>  
                            <h1 class='text-success fs-5 mb-0 pt-3'>+$num%</h1>
                        </td>
                        <td class='text-center'>
                        </td>
                    </tr>";
                }

                else if($HW1 == $HW2)
                {
                    
                    $out = "
                    <tr>
                        <td>
                        </td>
                        <td class='text-center'>  
                        </td>
                        <td class='text-center'>
                        </td>
                    </tr>";
                }
            }
            else
            {
                if($TITLE == "Price")
                {
                    if($HW1 != 0 && $HW2 != 0)
                    {
                        if($HW1 > $HW2)
                        {
                            $out = "
                            <tr>
                                <td>
                                </td>
                                <td class='text-center'>  
                                </td>
                                <td class='text-center'>
                                    <h1 class='text-success fs-5 mb-0 pt-3'>Cheaper</h1>
                                </td>
                            </tr>";
                        }

                        else if($HW1 < $HW2)
                        {
                            $out = "
                            <tr>
                                <td>
                                </td>
                                <td class='text-center'>  
                                    <h1 class='text-success fs-5 mb-0 pt-3'>Cheaper</h1>
                                </td>
                                <td class='text-center'>                          
                                </td>
                            </tr>";
                        }

                        else if($HW1 = $HW2)
                        {
                            $out = "
                            <tr>
                                <td>
                                </td>
                                <td class='text-center'>  
                                </td>
                                <td class='text-center'>                          
                                </td>
                            </tr>";
                        }
                    }
                    else
                    {
                        $out = "
                        <tr>
                            <td>
                            </td>
                            <td class='text-center'>  
                            </td>
                            <td class='text-center'>                          
                            </td>
                        </tr>";
                    }
                }

                else if($HW1 < $HW2)
                {
                    $out = "
                    <tr>
                        <td>
                        </td>
                        <td class='text-center'>  
                        </td>
                        <td class='text-center'>
                            <h1 class='text-success fs-5 mb-0 pt-3'>Better</h1>
                        </td>
                    </tr>";
                }
                else if($HW1 > $HW2)
                {
                    $out = "
                    <tr>
                        <td>
                        </td>
                        <td class='text-center'>  
                            <h1 class='text-success fs-5 mb-0 pt-3'>Better</h1>
                        </td>
                        <td class='text-center'>
                        </td>
                    </tr>";
                }
                else
                {
                    $out = "
                    <tr>
                        <td>
                        </td>
                        <td class='text-center'>  
                        </td>
                        <td class='text-center'>
                        </td>
                    </tr>";
                }
            }
        }
        else
        { 
            if($TITLE == "Age")
            {
                $todaydate = date('Y-m-d');  
                $calculate_seconds =  strtotime($todaydate) - strtotime($HW1);
                $AGE1 = floor($calculate_seconds / (60 * 60 * 24 * 30));

                if($HW2 != null)
                {
                    $calculate_seconds =  strtotime($todaydate) - strtotime($HW2);
                    $AGE2 = floor($calculate_seconds / (60 * 60 * 24 * 30));

                    if($AGE1 < $AGE2)
                    {
                        $out = "
                        <tr>
                            <td>
                            </td>
                            <td class='text-center'>  
                                <h1 class='text-success fs-5 mb-0 pt-3'>Newer</h1>
                            </td>
                            <td class='text-center'>                 
                            </td>
                        </tr>";
                    }

                    else if($AGE1 > $AGE2)
                    {
                        $out = "
                        <tr>
                            <td>
                            </td>
                            <td class='text-center'>   
                            </td>
                            <td class='text-center'>        
                                <h1 class='text-success fs-5 mb-0 pt-3'>Newer</h1>                  
                            </td>
                        </tr>";
                    }

                    else if($AGE1 = $AGE2)
                    {
                        $out = "
                        <tr>
                            <td>
                            </td>
                            <td class='text-center'>  
                            </td>
                            <td class='text-center'>                          
                            </td>
                        </tr>";
                    } 
                }
                else
                {
                    $out = "
                    <tr>
                        <td>
                        </td>
                         <td class='text-center'>  
                        </td>
                        <td class='text-center'>                          
                        </td>
                    </tr>";
                }
            }
            else if($TITLE == "Memory Type")
            {   
                $HW1MEMTYPE = 0;
                $HW2MEMTYPE = 0;
                if($HW1 == "DDR3")
                {
                    $HW1MEMTYPE = 1;
                }
                else if($HW1 == "GDDR3")
                {
                    $HW1MEMTYPE = 2;
                }
                else if($HW1 == "GDDR4")
                {
                    $HW1MEMTYPE = 3;
                }
                else if($HW1 == "GDDR5")
                {
                    $HW1MEMTYPE = 4;
                }
                else if($HW1 == "GDDR5X")
                {
                    $HW1MEMTYPE = 5;
                }
                else if($HW1 == "GDDR6")
                {
                    $HW1MEMTYPE = 6;
                }
                else if($HW1 == "GDDR6X")
                {
                    $HW1MEMTYPE = 7;
                }
                
                if(isset($HW2))
                {
                    if($HW2 == "DDR3")
                    {
                        $HW2MEMTYPE = 1;
                    }
                    else if($HW2 == "GDDR3")
                    {
                        $HW2MEMTYPE = 2;
                    }
                    else if($HW2 == "GDDR4")
                    {
                        $HW2MEMTYPE = 3;
                    }
                    else if($HW2 == "GDDR5")
                    {
                        $HW2MEMTYPE = 4;
                    }
                    else if($HW2 == "GDDR5X")
                    {
                        $HW2MEMTYPE = 5;
                    }
                    else if($HW2 == "GDDR6")
                    {
                        $HW2MEMTYPE = 6;
                    }
                    else if($HW2 == "GDDR6X")
                    {
                        $HW2MEMTYPE = 7;
                    }

                    if($HW1MEMTYPE > $HW2MEMTYPE)
                    {
                        $out = "
                        <tr>
                            <td>
                            </td>
                            <td class='text-center'>  
                                <h1 class='text-success fs-5 mb-0 pt-3'>Better</h1>
                            </td>
                            <td class='text-center'>                 
                            </td>
                        </tr>";
                    }

                    else if($HW1MEMTYPE < $HW2MEMTYPE)
                    {
                        $out = "
                        <tr>
                            <td>
                            </td>
                            <td class='text-center'>   
                            </td>
                            <td class='text-center'>        
                                <h1 class='text-success fs-5 mb-0 pt-3'>Better</h1>                  
                            </td>
                        </tr>";
                    }
                    else
                    {
                        $out = "
                        <tr>
                            <td>
                            </td>
                            <td class='text-center'>   
                            </td>
                            <td class='text-center'>             
                            </td>
                        </tr>";

                    }
                }
                else
                {
                    $out = "
                    <tr>
                        <td>
                        </td>
                        <td class='text-center'>  
                        </td>
                        <td class='text-center'>  
                        </td>
                    </tr>";
                }   
            }
            else if($TITLE == "DirectX")
            {   
                $HW1MEMTYPE = 0;
                $HW2MEMTYPE = 0;
                if($HW1 == "DirectX 9")
                {
                    $HW1MEMTYPE = 1;
                }
                else if($HW1 == "DirectX 10")
                {
                    $HW1MEMTYPE = 2;
                }
                else if($HW1 == "DirectX 11")
                {
                    $HW1MEMTYPE = 3;
                }
                else if($HW1 == "DirectX 12")
                {
                    $HW1MEMTYPE = 4;
                }
                else if($HW1 == "DirectX 12 Ultimate")
                {
                    $HW1MEMTYPE = 5;
                }
                
                if(isset($HW2))
                {
                    if($HW2 == "DirectX 9")
                    {
                        $HW2MEMTYPE = 1;
                    }
                    else if($HW2 == "DirectX 10")
                    {
                        $HW2MEMTYPE = 2;
                    }
                    else if($HW2 == "DirectX 11")
                    {
                        $HW2MEMTYPE = 3;
                    }
                    else if($HW2 == "DirectX 12")
                    {
                        $HW2MEMTYPE = 4;
                    }
                    else if($HW2 == "DirectX 12 Ultimate")
                    {
                        $HW2MEMTYPE = 5;
                    }

                    if($HW1MEMTYPE > $HW2MEMTYPE)
                    {
                        $out = "
                        <tr>
                            <td>
                            </td>
                            <td class='text-center'>  
                                <h1 class='text-success fs-5 mb-0 pt-3'>Better</h1>
                            </td>
                            <td class='text-center'>                 
                            </td>
                        </tr>";
                    }

                    else if($HW1MEMTYPE < $HW2MEMTYPE)
                    {
                        $out = "
                        <tr>
                            <td>
                            </td>
                            <td class='text-center'>   
                            </td>
                            <td class='text-center'>        
                                <h1 class='text-success fs-5 mb-0 pt-3'>Better</h1>                  
                            </td>
                        </tr>";
                    }
                    else
                    {
                        $out = "
                        <tr>
                            <td>
                            </td>
                            <td class='text-center'>   
                            </td>
                            <td class='text-center'>             
                            </td>
                        </tr>";

                    }
                }
                else
                {
                    $out = "
                    <tr>
                        <td>
                        </td>
                        <td class='text-center'>  
                        </td>
                        <td class='text-center'>  
                        </td>
                    </tr>";
                }   
            }
            else
            {
                $out = "
                <tr>
                    <td>
                    </td>
                    <td class='text-center'>   
                    </td>
                    <td class='text-center'>             
                    </td>
                </tr>";
            }
        }
        
        if($last == 0)
        {
            $out = $out . "<tr class='border-bottom' style='width: 20%;'>";
        }
        else
        {
            $out = $out . "<tr style='width: 20%;'>";
        }
        

        $out = $out . "
            <td> 
                <h1 class='text-white fs-5 mb-0 py-3 ps-3 ' >$TITLE</h1>
            </td>
            <td class='text-center' style='width: 40%;'>
                <h1 class='text-white fs-5 fw-light mb-0'>";
                
                if($TITLE == "Memory")
                {
                    $out = $out . "$HW1 GB</h1></td>";
                }
                else if($TITLE == "Price")
                {
                    if($HW1 == 0)
                    {
                        $out = $out . "N/A</h1></td>";
                    }
                    else
                    {
                        $out = $out . "$HW1 USD</h1></td>";
                    }
                }
                else if($TITLE == "Memory Interface")
                {
                    $out = $out . "$HW1-bit</h1></td>";
                }
                else if($TITLE == "Base Clockrate")
                {
                    $out = $out . "$HW1 MHz</h1></td>";
                }
                else if($TITLE == "Boost Clockrate")
                {
                    if($HW1 == 0)
                    {
                        $out = $out . "-</h1></td>";
                    }
                    else
                    {
                        $out = $out . "$HW1 MHz</h1></td>";
                    }
                    
                }
                else if($TITLE == "SLI Support")
                {
                    if($HW1 == 1)
                    {
                        $out = $out . "Yes</h1></td>";
                    }
                    else
                    {
                        $out = $out . "No</h1></td>";
                    } 
                }   
                else if($TITLE == "Age")
                {
                    $out = $out . "$AGE1 Months</h1></td>";
                }
                else if($TITLE == "Base Clock Rate")
                {
                    $out = $out . "$HW1 MHz</h1></td>";
                }
                else if($TITLE == "Turbo Clock Rate")
                {
                    if($HW1 == 0)
                    {
                        $out = $out . "-</h1></td>";
                    }
                    else
                    {
                        $out = $out . "$HW1 MHz</h1></td>";
                    } 
                    
                }
                else if($TITLE == "Cooler Included")
                {
                    if($HW1 == 1)
                    {
                        $out = $out . "Yes</h1></td>";
                    }
                    else
                    {
                        $out = $out . "No</h1></td>";
                    } 
                }
                else
                {
                    $out = $out . "$HW1</h1></td>";
                }

                $out = $out . "<td class='text-center' style='width: 40%;'>";  
            

        if(isset($HW2))
        {
            $out = $out . " <h1 class='text-white fs-5 fw-light mb-0 '>";

            if($TITLE == "Memory")
            {
                $out = $out . "$HW2 GB</h1></td>";
            }
            else if($TITLE == "Price")
            {
                if($HW2 == 0)
                {
                    $out = $out . "N/A</h1></td>";
                }
                else
                {
                    $out = $out . "$HW2 USD</h1></td>";
                }
                
            }
            else if($TITLE == "Memory Interface")
            {
                $out = $out . "$HW2-bit</h1></td>";
            }
            else if($TITLE == "Base Clockrate")
            {
                $out = $out . "$HW2 MHz</h1></td>";
            }
            else if($TITLE == "Boost Clockrate")
            {
                if($HW2 == 0)
                {
                    $out = $out . "-</h1></td>";
                }
                else
                {
                    $out = $out . "$HW2 MHz</h1></td>";
                }
                
            }
            else if($TITLE == "SLI Support")
            {
                if($HW2 == 1)
                {
                    $out = $out . "Yes</h1></td>";
                }
                else
                {
                    $out = $out . "No</h1></td>";
                } 
            }
            else if($TITLE == "Age")
            {
                $out = $out . "$AGE2 Months</h1></td>";
            }
            else if($TITLE == "Base Clock Rate")
            {
                $out = $out . "$HW2 MHz</h1></td>";
            }
            else if($TITLE == "Turbo Clock Rate")
            {
                $out = $out . "$HW2 MHz</h1></td>";
            }
            else if($TITLE == "Cooler Included")
                {
                    if($HW2 == 1)
                    {
                        $out = $out . "Yes</h1></td>";
                    }
                    else
                    {
                        $out = $out . "No</h1></td>";
                    } 
                }
            else
            {
                $out = $out . "$HW2</h1></td>";
            }
        }

        $out = $out . "</td></tr>";

        return $out;
    }

    function MobileTableOut($last, $TITLE, $HW1, $HW2)
    {
        $out = "
        <tr>
            <td colspan='2'> 
                <h1 class='text-white fs-5 mb-0 pt-3 mb-2'>$TITLE</h1>
            </td>
        </tr>";

        if((is_numeric($HW1) && (isset($HW1))) && (is_numeric($HW2) && (isset($HW2))))
        {
            if($HW1 != 0 && $HW2 != 0)  
            {
                if($TITLE == "SLI Support")
                {
                    if($HW1 < $HW2)
                    {
                        $out =  $out . "
                        <tr>
                            <td class='text-center' style='width: 50%'>  
                            </td>
                            <td class='text-center' style='width: 50%'>
                                <h1 class='text-success fs-6 mb-0 pt-2'>Better</h1>
                            </td>
                        </tr>";
                    }

                    else if($HW1 > $HW2)
                    {
                        $out =  $out . "
                        <tr>
                            <td class='text-center' style='width: 50%'>  
                                <h1 class='text-success fs-6 mb-0 pt-2'>Better</h1>
                            </td>
                            <td class='text-center' style='width: 50%'>                          
                            </td>
                        </tr>";
                    }

                    else if($HW1 = $HW2)
                    {
                        $out =  $out . "
                        <tr>
                            <td class='text-center' style='width: 50%'>  
                            </td>
                            <td class='text-center' style='width: 50%'>                          
                            </td>
                        </tr>";
                    }

                }

                if($TITLE == "Price")
                {
                    if($HW1 > $HW2)
                    {
                        $out = $out . "
                        <tr>
                            <td class='text-center' style='width: 50%'>  
                            </td>
                            <td class='text-center' style='width: 50%'>
                                <h1 class='text-success fs-6 mb-0 pt-2'>Cheaper</h1>
                            </td>
                        </tr>";
                    }

                    else if($HW1 < $HW2)
                    {
                        $out = $out ."
                        <tr>
                            <td class='text-center' style='width: 50%'>
                                <h1 class='text-success fs-6 mb-0 pt-2'>Cheaper</h1>  
                            </td>
                            <td class='text-center' style='width: 50%'>   
                            </td>
                        </tr>";
                    }

                    else if($HW1 = $HW2)
                    {
                        $out = $out ."
                        <tr>
                            <td class='text-center' style='width: 50%'>
                            </td>
                            <td class='text-center' style='width: 50%'>   
                            </td>
                        </tr>";
                        
                    }
                }

                else if($TITLE == "Cooler Included")
                {
                    if($HW1 < $HW2)
                    {
                        $out =  $out . "
                        <tr>
                            <td class='text-center' style='width: 50%'>  
                            </td>
                            <td class='text-center' style='width: 50%'>
                                <h1 class='text-success fs-6 mb-0 pt-2'>Better</h1>
                            </td>
                        </tr>";
                    }

                    else if($HW1 > $HW2)
                    {
                        $out =  $out . "
                        <tr>
                            <td class='text-center' style='width: 50%'>  
                                <h1 class='text-success fs-6 mb-0 pt-2'>Better</h1>
                            </td>
                            <td class='text-center' style='width: 50%'>                          
                            </td>
                        </tr>";
                    }

                    else if($HW1 = $HW2)
                    {
                        $out = $out .  "
                        <tr>
                            <td class='text-center' style='width: 50%'>  
                            </td>
                            <td class='text-center' style='width: 50%'>                          
                            </td>
                        </tr>";
                    }

                }

                else if($HW1 < $HW2)
                {
                    $mempercent = $HW2/$HW1*100;
                    $num = round($mempercent, 2);
                    
                    $out = $out .  "
                    <tr>
                        <td class='text-center' style='width: 50%'>  
                        </td>
                        <td class='text-center' style='width: 50%'>
                            <h1 class='text-success fs-6 mb-0 pt-2'>+$num%</h1>
                        </td>
                    </tr>";
                }
        
                else if($HW1 > $HW2)
                {
                    $mempercent = $HW1/$HW2*100;
                    $num = round($mempercent, 2);
                    
                    $out =  $out . "
                    <tr>
                        <td class='text-center' style='width: 50%'>  
                            <h1 class='text-success fs-6 mb-0 pt-2'>+$num%</h1>
                        </td>
                        <td class='text-center' style='width: 50%'>
                        </td>
                    </tr>";
                }

                else if($HW1 == $HW2)
                {
                    
                    $out =  $out . "
                    <tr>
                        <td class='text-center' style='width: 50%'>  
                        </td>
                        <td class='text-center' style='width: 50%'>
                        </td>
                    </tr>";
                }
            }
            else
            {
                if($HW1 < $HW2)
                {
                    $out =  $out . "
                    <tr>
                        <td class='text-center' style='width: 50%'>  
                        </td>
                        <td class='text-center' style='width: 50%'>
                            <h1 class='text-success fs-5 mb-0 pt-2'>Better</h1>
                        </td>
                    </tr>";
                }
                else if($HW1 > $HW2)
                {
                    $out =  $out . "
                    <tr>
                        <td class='text-center' style='width: 50%'>  
                            <h1 class='text-success fs-5 mb-0 pt-2'>Better</h1>
                        </td>
                        <td class='text-center' style='width: 50%'>
                        </td>
                    </tr>";
                }
                else
                {
                    $out =  $out . "
                    <tr>
                        <td class='text-center' style='width: 50%'>  
                        </td>
                        <td class='text-center' style='width: 50%'>
                        </td>
                    </tr>";
                }
            }
        }
        else
        { 
            if($TITLE == "Age")
            {
                $todaydate = date('Y-m-d');  
                $calculate_seconds =  strtotime($todaydate) - strtotime($HW1);
                $AGE1 = floor($calculate_seconds / (60 * 60 * 24 * 30));

                if($HW2 != null)
                {
                    $calculate_seconds =  strtotime($todaydate) - strtotime($HW2);
                    $AGE2 = floor($calculate_seconds / (60 * 60 * 24 * 30));

                    if($AGE1 < $AGE2)
                    {
                        $out =  $out . "
                        <tr>
                            <td class='text-center' style='width: 50%'>  
                                <h1 class='text-success fs-6 mb-0 pt-2'>Newer</h1>
                            </td>
                            <td class='text-center' style='width: 50%'>                 
                            </td>
                        </tr>";
                    }

                    else if($AGE1 > $AGE2)
                    {
                        $out =  $out . "
                        <tr>
                            <td class='text-center' style='width: 50%'>   
                            </td>
                            <td class='text-center' style='width: 50%'>        
                                <h1 class='text-success fs-6 mb-0 pt-2'>Newer</h1>                  
                            </td>
                        </tr>";
                    }

                    else if($AGE1 = $AGE2)
                    {
                        $out =  $out . "
                        <tr>
                            <td class='text-center' style='width: 50%'>  
                            </td>
                            <td class='text-center' style='width: 50%'>                          
                            </td>
                        </tr>";
                    } 
                }
                else
                {
                    $out =  $out . "
                    <tr>
                         <td class='text-center' style='width: 50%'>  
                        </td>
                        <td class='text-center' style='width: 50%'>                          
                        </td>
                    </tr>";
                }
            }
            else if($TITLE = "Memory Type")
            {   
                $HW1MEMTYPE = 0;
                $HW2MEMTYPE = 0;
                if($HW1 == "DDR3")
                {
                    $HW1MEMTYPE = 1;
                }
                else if($HW1 == "GDDR3")
                {
                    $HW1MEMTYPE = 2;
                }
                else if($HW1 == "GDDR4")
                {
                    $HW1MEMTYPE = 3;
                }
                else if($HW1 == "GDDR5")
                {
                    $HW1MEMTYPE = 4;
                }
                else if($HW1 == "GDDR5X")
                {
                    $HW1MEMTYPE = 5;
                }
                else if($HW1 == "GDDR6")
                {
                    $HW1MEMTYPE = 6;
                }
                else if($HW1 == "GDDR6X")
                {
                    $HW1MEMTYPE = 7;
                }
                
                if(isset($HW2))
                {
                    if($HW2 == "DDR3")
                    {
                        $HW2MEMTYPE = 1;
                    }
                    else if($HW2 == "GDDR3")
                    {
                        $HW2MEMTYPE = 2;
                    }
                    else if($HW2 == "GDDR4")
                    {
                        $HW2MEMTYPE = 3;
                    }
                    else if($HW2 == "GDDR5")
                    {
                        $HW2MEMTYPE = 4;
                    }
                    else if($HW2 == "GDDR5X")
                    {
                        $HW2MEMTYPE = 5;
                    }
                    else if($HW2 == "GDDR6")
                    {
                        $HW2MEMTYPE = 6;
                    }
                    else if($HW2 == "GDDR6X")
                    {
                        $HW2MEMTYPE = 7;
                    }

                    if($HW1MEMTYPE > $HW2MEMTYPE)
                    {
                        $out = $out ."
                        <tr>
                            <td class='text-center'>  
                                <h1 class='text-success fs-6 mb-0 pt-3'>Better</h1>
                            </td>
                            <td class='text-center'>                 
                            </td>
                        </tr>";
                    }

                    else if($HW1MEMTYPE < $HW2MEMTYPE)
                    {
                        $out = $out ."
                        <tr>
                            <td class='text-center'>   
                            </td>
                            <td class='text-center'>        
                                <h1 class='text-success fs-6 mb-0 pt-3'>Better</h1>                  
                            </td>
                        </tr>";
                    }
                    else
                    {
                        $out = $out ."
                        <tr>
                            <td class='text-center'>   
                            </td>
                            <td class='text-center'>             
                            </td>
                        </tr>";

                    }
                }
                else
                {
                    $out = $out ."
                    <tr>
                        <td class='text-center'>  
                        </td>
                        <td class='text-center'>  
                        </td>
                    </tr>";
                }   
            }
            else
            {
                $out =  $out . "
                <tr>
                    <td class='text-center' style='width: 50%'>  
                    </td>
                    <td class='text-center' style='width: 50%'>  
                    </td>
                </tr>";
            }
        }
        
        if($last == 0)
        {
            $out = $out . "<tr class='border-bottom'>";
        }
        else
        {
            $out = $out . "<tr>";
        }
        

        $out = $out . "
            <td class='text-center'  style='width: 50%'>
                <h1 class='text-white fs-6 fw-light '>";
                
                if($TITLE == "Memory")
                {
                    $out = $out . "$HW1 GB</h1></td>";
                }
                else if($TITLE == "Price")
                {
                    if($HW1 == 0)
                    {
                        $out = $out . "N/A</h1></td>";
                    }
                    else
                    {
                        $out = $out . "$HW1 USD</h1></td>";
                    }
                }
                else if($TITLE == "Memory Interface")
                {
                    $out = $out . "$HW1-bit</h1></td>";
                }
                else if($TITLE == "Base Clockrate")
                {
                    $out = $out . "$HW1 MHz</h1></td>";
                }
                else if($TITLE == "Boost Clockrate")
                {
                    if($HW1 == 0)
                    {
                        $out = $out . "-</h1></td>";
                    }
                    else
                    {
                        $out = $out . "$HW1 MHz</h1></td>";
                    }
                    
                }
                else if($TITLE == "SLI Support")
                {
                    if($HW1 == 1)
                    {
                        $out = $out . "Yes</h1></td>";
                    }
                    else
                    {
                        $out = $out . "No</h1></td>";
                    } 
                }   
                else if($TITLE == "Age")
                {
                    $out = $out . "$AGE1 Months</h1></td>";
                }
                else if($TITLE == "Base Clock Rate")
                {
                    $out = $out . "$HW1 MHz</h1></td>";
                }
                else if($TITLE == "Turbo Clock Rate")
                {
                    if($HW1 == 0)
                    {
                        $out = $out . "-</h1></td>";
                    }
                    else
                    {
                        $out = $out . "No</h1></td>";
                    } 
                    $out = $out . "$HW1 MHz</h1></td>";
                }
                else if($TITLE == "Cooler Included")
                {
                    if($HW1 == 1)
                    {
                        $out = $out . "Yes</h1></td>";
                    }
                    else
                    {
                        $out = $out . "No</h1></td>";
                    } 
                }
                else
                {
                    $out = $out . "$HW1</h1></td>";
                }

                $out = $out . "<td class='text-center' style='width: 50%'>";  
            

        if(isset($HW2))
        {
            $out = $out . " <h1 class='text-white fs-6 fw-light '>";

            if($TITLE == "Memory")
            {
                $out = $out . "$HW2 GB</h1></td>";
            }
            else if($TITLE == "Price")
            {
                if($HW2 == 0)
                {
                    $out = $out . "N/A</h1></td>";
                }
                else
                {
                    $out = $out . "$HW2 USD</h1></td>";
                }
                
            }
            else if($TITLE == "Memory Interface")
            {
                $out = $out . "$HW2-bit</h1></td>";
            }
            else if($TITLE == "Base Clockrate")
            {
                $out = $out . "$HW2 MHz</h1></td>";
            }
            else if($TITLE == "Boost Clockrate")
            {
                if($HW2 == 0)
                {
                    $out = $out . "-</h1></td>";
                }
                else
                {
                    $out = $out . "$HW2 MHz</h1></td>";
                }
                
            }
            else if($TITLE == "SLI Support")
            {
                if($HW2 == 1)
                {
                    $out = $out . "Yes</h1></td>";
                }
                else
                {
                    $out = $out . "No</h1></td>";
                } 
            }
            else if($TITLE == "Age")
            {
                $out = $out . "$AGE2 Months</h1></td>";
            }
            else if($TITLE == "Base Clock Rate")
            {
                $out = $out . "$HW2 MHz</h1></td>";
            }
            else if($TITLE == "Turbo Clock Rate")
            {
                $out = $out . "$HW2 MHz</h1></td>";
            }
            else if($TITLE == "Cooler Included")
                {
                    if($HW2 == 1)
                    {
                        $out = $out . "Yes</h1></td>";
                    }
                    else
                    {
                        $out = $out . "No</h1></td>";
                    } 
                }
            else
            {
                $out = $out . "$HW2</h1></td>";
            }
        }

        $out = $out . "</td></tr>";

        return $out;
    }
?>