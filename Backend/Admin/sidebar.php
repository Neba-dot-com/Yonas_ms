<div class="SideBar">

            <ul>
                <li>
                    <a <?php if ($page === 'Dashboard') { echo 'class="active"'; } ?> href="index.php">
                        <i class="fas fa-th-large"></i>
                        <div>Dashboard</div>
                    </a>
                </li>
                <li>
                    <a <?php if ($page === 'customer') { echo 'class="active"'; } ?> href="viewcus.php">
                        <i class="fas fa-user-check"></i>
                        <div> Customer</div>
                    </a>
                </li>
 
                <li>
                    <a <?php if ($page === 'manager') { echo 'class="active"'; } ?> href="manager.php">
                        <i class="fas fa-user-tie"></i>
                        <div>Store Manager</div>
                    </a>
                </li>

                <li>
                    <a <?php if ($page === 'cashier') { echo 'class="active"'; } ?> href="cashier.php">
                        <i class="fas fa-cash-register"></i>
                        <div> Cashier</div>
                    </a>
                </li>

                <li>
                    <a  <?php if ($page === 'sale') { echo 'class="active"'; } ?> href="sales.php">
                        <i class="fas fa-briefcase "></i>
                        <div> SalesMan</div>
                    </a>
                </li>


            </ul>

        </div>