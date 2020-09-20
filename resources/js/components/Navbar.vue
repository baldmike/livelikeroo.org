<template>
    <navbar position="fixed"
            :transparent="transparent"
            :color-on-scroll="colorOnScroll"
            menu-classes="ml-auto">
        <template slot-scope="{toggle, isToggled}">
                <router-link class="navbar-brand" to="/" style="border: none;">
                    <img src="/images/llr_logo.png" alt="LLR Logo" id="navLogo" width="70">
                </router-link>
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
            <li class="nav-item">
                <router-link class="nav-link nav-slice" to="/donate"><i class="fas fa-donate roo"
                aria-hidden="true" style="font-size: 1rem;"></i><h3>Donate</h3></router-link>
            </li>
            <!-- <li class="nav-item">
                <router-link class="nav-link nav-slice" to="/care_package"><i class="fas fa-gift roo"
                aria-hidden="true" style="font-size: 1rem;"></i><h3>Care Packages</h3></router-link>
            </li> -->
            <li class="nav-item">
                <router-link class="nav-link nav-slice" to="/assistance"><i class="fas fa-heart roo"
                aria-hidden="true" style="font-size: 1rem;"></i><h3>Assistance</h3></router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link nav-slice" to="/events"><i class="fas fa-calendar-alt roo"
                aria-hidden="true" style="font-size: 1rem;"></i><h3>events</h3></router-link>
            </li>
            

            <!-- <li class="nav-item">
                <router-link class="nav-link" to="/shop"><i class="now-ui-icons shopping_basket roo"
                aria-hidden="true"></i><p>Shop</p></router-link>
            </li> -->
            
            <drop-down style="font-size: 1.4rem;" tag="li" title="programs" class="nav-item nav-slice">
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
    },

    methods: {
        mailingList() {
            this.window.locaiton('https://livelikeroo.us17.list-manage.com/subscribe?u=f575bf61e2aa626cab5515697&id=9dbe1990e7');
        }
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
