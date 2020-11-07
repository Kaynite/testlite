import Vue from "vue";
import VueRouter from "vue-router";
import ExampleComponent from "./components/ExampleComponent";
import CreateContact from "./views/CreateContact";
import ShowContact from "./views/ShowContact";
import EditContact from "./views/EditContact";
import IndexContacts from "./views/IndexContacts";
import Birthdays from "./views/IndexBirthdayContacts";

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path: "/",
            component: ExampleComponent,
            name: "Home",
            meta: {
                title: "Home"
            }
        },
        {
            path: "/contacts",
            component: IndexContacts,
            name: "IndexContacts",
            meta: {
                title: "Contacts"
            }
        },
        {
            path: "/contacts/create",
            component: CreateContact,
            name: "CreateContact",
            meta: {
                title: "Create New Contact"
            }
        },
        {
            path: "/contacts/:id",
            component: ShowContact,
            name: "ShowContact",
            meta: {
                title: "Contact Details"
            }
        },
        {
            path: "/contacts/:id/edit",
            component: EditContact,
            name: "EditContact",
            meta: {
                title: "Edit Contact"
            }
        },
        {
            path: "/birthdays",
            component: Birthdays,
            name: "Birthdays",
            meta: {
                title: "This Month's Birthdays"
            }
        }
    ],
    mode: "history"
});
