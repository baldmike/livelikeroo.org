<template>
    <navbar position="fixed"
            :transparent="transparent"
            :color-on-scroll="colorOnScroll"
            menu-classes="ml-auto">
        <template slot-scope="{toggle, isToggled}">
                
                <!-- <el-popover
                        ref="popover1"
                        popper-class="popover"
                        placement="bottom"
                        width="120"
                        trigger="hover">
                    <div class="popover-body">Click here to bring you Home!</div>
                </el-popover> -->
        </template>
        <template slot="navbar-menu">
            <li>
                <router-link class="navbar-brand" to="/" style="border: none;">
                    <img src="/images/llr_logo.png" alt="LLR Logo" id="navLogo" width="70">
                </router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link nav-slice" to="/donate"><i class="fas fa-donate roo"
                aria-hidden="true" style="font-size: 1rem;"></i><h5>Donate</h5></router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link nav-slice" to="/care_package"><i class="fas fa-gift roo"
                aria-hidden="true" style="font-size: 1rem;"></i><h5>Care Packages</h5></router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link nav-slice" to="/assistance"><i class="fas fa-heart roo"
                aria-hidden="true" style="font-size: 1rem;"></i><h5>Assistance</h5></router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link nav-slice" to="/events"><i class="fas fa-calendar-alt roo"
                aria-hidden="true" style="font-size: 1rem;"></i><h5>events</h5></router-link>
            </li>

            <li class="nav-item">
                <router-link class="nav-link nav-slice" to="/shop"><i class="fas fa-shopping-cart roo"
                aria-hidden="true" style="font-size: 1rem;"></i><h5>shop</h5></router-link>
            </li>

            <!-- <li class="nav-item">
                <router-link class="nav-link nav-slice" to="/wishlist" _target="black"><img src = "/images/Amazon-Wish-List-Logo.png"></router-link>
            </li> -->
            
            <drop-down style="font-size: 1rem;" tag="li" title="programs" class="nav-item nav-slice">
                <nav-link class="dropdown-item" to="/booker">
                    <i class="now-ui-icons emoticons_satisfied" style="color: #fd7e14;"></i> Booker Fund
                </nav-link>
                <nav-link class="dropdown-item" to="/cappy">
                    <i class="now-ui-icons emoticons_satisfied" style="color: #384666;"></i> The Cappy Fund
                </nav-link>
                <nav-link class="dropdown-item" to="/maggie">
                    <i class="now-ui-icons emoticons_satisfied" style="color: green;"></i> Maggie's Mission
                </nav-link>
                <nav-link class="dropdown-item" to="/serenity">
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

    .nav-slice {
        text-align: center;  
        width: 180px;      
    }
</style>
