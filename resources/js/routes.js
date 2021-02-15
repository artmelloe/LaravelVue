import AllNotepad from './components/AllNotepad.vue';
import CreateNotepad from './components/CreateNotepad.vue';
import EditNotepad from './components/EditNotepad.vue';
 
export const routes = [
    {
        name: 'dashboard',
        path: '/',
        component: AllNotepad
    },
    {
        name: 'create',
        path: '/create',
        component: CreateNotepad
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditNotepad
    }
];