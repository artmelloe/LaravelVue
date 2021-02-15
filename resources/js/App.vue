<template>
    <div>
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <router-link to="/" class="nav-item nav-link">
                            <span data-feather="home"></span> Dashboard
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/create" class="nav-item nav-link">
                            <span data-feather="file"></span> Nova nota
                        </router-link>
                    </li>
                </ul>
            </div>
        </nav>
        <router-view></router-view>
    </div>
</template>
 
<script>
    export default {}
</script>