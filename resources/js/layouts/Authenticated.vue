<template>
    <AdminNavbar/>
    <div class="d-flex align-items-stretch w-100" style="--bs-gutter-x: 0 !important;">
        <AdminSidebar @toggle="handleSidebarToggle"/>
        <div class="container-fluid" :class="{ 'collapsed-margin': isSidebarCollapsed }" style="--bs-gutter-x: 0; padding-right: 0; padding-left: 0;">
<!--            <Breadcrumb class="row justify-content-center mt-4" :crumbs="crumbs" @selected="selected"/>-->
            <div class="main">
                <Suspense>
                    <router-view></router-view>
                </Suspense>
            </div>
        </div>
    </div>
</template>

<script setup>
import {computed, ref} from "vue";
import {useRoute} from "vue-router";
import AdminNavbar from "../components/includes/AdminNavbar.vue";
import AdminSidebar from "../components/includes/AdminSidebar.vue";
import Breadcrumb from "../components/includes/Breadcrumb.vue";
import {useI18n} from 'vue-i18n';

const route = useRoute();
const {t} = useI18n();

const isSidebarCollapsed = ref(false);
const contentMargin = ref('250px');

const handleSidebarToggle = (collapsed) => {
    isSidebarCollapsed.value = collapsed;
};

const crumbs = computed(() => {
    let pathArray = route.path.split('/');
    pathArray.shift();
    const breadCrumbs = [{"href": "/admin", "disabled": false, "text": t('main_page.dashboard')}];
    let breadCrumb = '';
    let lastIndexFound = 0;
    for (let i = 0; i < pathArray.length; ++i) {
        breadCrumb = `${breadCrumb}${'/'}${pathArray[i]}`;
        if (route.matched[i] &&
            Object.hasOwnProperty.call(route.matched[i], 'meta') &&
            Object.hasOwnProperty.call(route.matched[i].meta, 'breadCrumb')) {
            breadCrumbs.push({
                href: i !== 0 && pathArray[i - (i - lastIndexFound)]
                    ? '/' + pathArray[i - (i - lastIndexFound)] + breadCrumb
                    : breadCrumb,
                disabled: i + 1 === pathArray.length,
                text: t(route.matched[i].meta.breadCrumb) || pathArray[i]
            });
            lastIndexFound = i;
            breadCrumb = '';
        }
    }

    return breadCrumbs;
});

function selected(crumb) {
    // console.log(crumb);
}

</script>

<style scoped>
.navbar-brand {
    padding-top: .2rem;
    padding-bottom: .2rem;
    min-width: 250px;
    max-width: 250px;
    align-self: stretch;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    transition: all .3s linear;
}

.main-content, .sidebar {
    height: calc(100vh - 56px);
    overflow-x: hidden;
    overflow-y: auto;
}

.sidebar {
    position: relative;
    z-index: 100;
    box-shadow: 1px 0 10px rgba(0, 0, 0, .1);
    min-width: 250px;
    max-width: 250px;
    transition: all .3s linear;
}

.sidebar.mini {
    min-width: 60px;
    max-width: 60px;
}

.sidebar ul li a.active, .sidebar ul li a:hover {
    color: #4a6cf7;
    border-color: rgba(74, 108, 247, 0.15);
    background: rgba(74, 108, 247, 0.1);
}

@media (max-width: 767.98px) {
    .navbar-brand, .sidebar {
        min-width: 60px;
        max-width: 60px;
    }

    .navbar-brand {
        min-width: 60px;
        max-width: 60px;
    }

    .navbar-brand span {
        min-width: 20px;
        max-width: 20px;
        font-weight: 900;
        overflow: hidden;
    }
}

.main {
    transition: margin-left 0.3s ease;
}

.container-fluid {
    margin-left: 250px;
    transition: margin-left 0.3s ease;
}
.container-fluid.collapsed-margin {
    margin-left: 50px !important;
}
</style>
