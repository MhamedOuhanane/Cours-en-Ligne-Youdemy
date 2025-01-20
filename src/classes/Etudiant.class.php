<?php
    spl_autoload_register(function($class){
        require $class . ".class.php";
    });

    class Etudiant extends Users {
    
        function toString($date)
        {
            echo '<tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <img src="data:image/png;base64, '. htmlspecialchars(base64_encode($this->image)) .'" alt="Student" class="w-10 h-10 rounded-full mr-3">
                            <div>
                                <div class="text-sm font-medium text-gray-900">'. htmlspecialchars($this->username) .'</div>
                                <div class="text-sm text-gray-500">'. htmlspecialchars($this->email) .'</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">'. htmlspecialchars($date) .'</div>
                    </td>
                </tr>';
        }
    }