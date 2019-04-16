<template>
    <navbar position="fixed"
            :transparent="transparent"
            :color-on-scroll="colorOnScroll"
            menu-classes="ml-auto">
        <template slot-scope="{toggle, isToggled}">
                <router-link v-popover:popover1 class="navbar-brand" to="/">
                    <img src="/images/llr_logo.png" alt="LLR Logo" id="navLogo" width="70">
                </router-link>
                <el-popover
                        ref="popover1"
                        popper-class="popover"
                        placement="bottom"
                        width="120"
                        trigger="hover">
                    <div class="popover-body">Click here to bring you Home!</div>
                </el-popover>
        </template>
        <template slot="navbar-menu">
            <li class="nav-item">
                <router-link class="nav-link" to="/donate"><i class="now-ui-icons business_money-coins roo"
                aria-hidden="true"></i><p>Donate</p></router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link" to="/care_packages"><i class="now-ui-icons shopping_box roo"
                aria-hidden="true"></i><p>Care Packages</p></router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link" to="/assistance"><i class="now-ui-icons ui-2_favourite-28 roo"
                aria-hidden="true"></i><p>Assistance</p></router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link" to="/events"><i class="now-ui-icons ui-1_calendar-60 roo"
                aria-hidden="true"></i><p>Events</p></router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link" to="/shop"><i class="now-ui-icons shopping_basket roo"
                aria-hidden="true"></i><p>Shop</p></router-link>
            </li>
            
            <drop-down tag="li" title="programs" class="nav-item">
                <nav-link class="dropdown-item" to="/sections#headers">
                    <i class="now-ui-icons emoticons_satisfied" style="color: red;"></i> Booker Fund
                </nav-link>
                <nav-link class="dropdown-item" to="/sections#features">
                    <i class="now-ui-icons emoticons_satisfied" style="color: orange;"></i> CRISP
                </nav-link>
                <nav-link class="dropdown-item" to="/sections#blogs">
                    <i class="now-ui-icons emoticons_satisfied" style="color: green;"></i> Cappy's Fund
                </nav-link>
                <nav-link class="dropdown-item" to="/sections#teams">
                    <i class="now-ui-icons emoticons_satisfied" style="color: blue;"></i> Maggie's Mission
                </nav-link>
                <nav-link class="dropdown-item" to="/sections#teams">
                    <i class="now-ui-icons emoticons_satisfied" style="color: violet;"></i> Serenity's Wish
                </nav-link>
            </drop-down>

        </template>
    </navbar>
</template>

<script>
  import { DropDown, NavbarToggleButton, Navbar, NavLink } from '@/components';
  import { Popover } from 'element-ui'
  export default {
    name: 'main-navbar',
    props: {
      transparent: Boolean,
      colorOnScroll: Number,
    },
    components: {
      DropDown,
      Navbar,
      NavbarToggleButton,
      NavLink,
      [Popover.name]: Popover
    }
  }
</script>

<style scoped>
    .roo {
        color: #fd7e14;
    }
</style>
