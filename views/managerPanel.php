<!--<button type="button" class="btn">Profile</button>-->
<div class="drawer drawer-end">
    <form action="" method="post">
    <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
        <!-- Page content here -->
        <label for="my-drawer-4" class="drawer-button btn btn-primary">Profile</label>
    </div>
    <div class="drawer-side">
        <label for="my-drawer-4" class="drawer-overlay"></label>
        <ul class="menu p-4 w-80 min-h-full bg-base-200 text-base-content">
            <!-- Sidebar content here -->
            <li>
                <a href="profile" class="  rounded-box border border-4 border-red-700 text-green-800">
                    Edit
                    <iconify-icon icon="grommet-icons:status-warning"></iconify-icon>
                </a>
                <a href="departments" class="  rounded-box border border-4 border-red-700 text-green-800">
                    manage departments
                </a>
            </li>
            <li>
                <a href="managementStatus">
                    manage status
                </a>
            </li>
            <li>
                    <button type="submit" class="text-red-900">Logout</button>
            </li>
        </ul>
    </div>
    </form>
</div>