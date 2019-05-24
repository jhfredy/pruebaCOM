<template>
    <div class="card shadow">
        <div class="row">
            <div class="col">
                <h2 class="card-title text-uppercase text-muted mb-0" style="margin-top: 25px;">Usuarios</h2>
                
            </div>
            <div class="col-auto">
                <button class="icon icon-shape btn bg-success text-white rounded-circle" @click="abrirModal('user','add')" data-toggle="modal" data-target="#myModal" style="margin-top: 15px;">
                <i class="fas fa-plus"></i>
                </button>
                
            </div>
            <nav class="navbar ">
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" v-model="search">
                    <!-- <button class="btn btn-outline-success my-2 my-sm-0" @click.prevent="listarUsuario(1,search)">Search</button> -->
                </form>
                </nav>
        </div>
        <!-- inicio de la tabla de usuario -->
        <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Actions</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Municipio</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr v-for="usuario in arrayUsuarios" :key="usuario.id">
                        <th scope="row">
                        <div class="media align-items-center">
                        <button class="icon icon-shape btn bg-info text-white rounded-circle" type="button" @click="abrirModal('user','edit',usuario)" data-toggle="modal" data-target="#myModal">
                                <span class="btn-inner--icon"><i class="fa fa-edit"></i></span>
                            </button>
                        <button class="icon icon-shape btn bg-danger text-white rounded-circle" type="button" @click="deleteUsuario(usuario.id)">
                                <span class="btn-inner--icon"><i class="fa fa-trash"></i></span>
                            </button>
                        </div>
                        </th>
                        <td v-text="usuario.name">
                        </td>
                        <td>
                        <span class="badge badge-dot mr-4">
                            <i class="bg-warning"></i> {{usuario.email}}
                        </span>
                        </td>
                        <td v-text="usuario.municipios.municipio"> </td>
                        
                        
                    </tr>
                    
                </tbody>
            </table>
        </div>
        <!-- fin tabla usuario -->
        <!-- empieza la paginacion -->
        <nav>
            <ul class="pagination">
                <li class="page-item" v-if="pagination.current_page>1">
                    <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page-1,search)">Ant</a>
                </li>
                <li class="page-item " v-for="page in pagesNumber" :key="page" :class="[page==isActived ? 'active':'']">
                    <a class="page-link" href="#" @click.prevent="changePage(page,search)" v-text="page"></a>
                </li>

                <li class="page-item"  v-if="pagination.current_page<pagination.last_page">
                    <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page+1,search)">Sig</a>
                </li>
            </ul>
        </nav>
        <!-- inicio de modal agregar/editar usuarios -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modal-title-default" v-text="titleModal"></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                         <b-form>
                             <b-form-group id="IGname" label="Name:" label-for="nombre">
                                <b-form-input id="nombre" type="text" v-model="name" required placeholder="Ingresa el nombre"></b-form-input>
                             </b-form-group> 
                             <b-form-group id="IGemail" label="Email:" label-for="email">
                                <b-form-input id="email" type="email" v-model="email" required placeholder="Ingresa el Email"></b-form-input>
                             </b-form-group>
                             <div class="row">
                                 <div class="col-md-12">
                                        <b-form-group id="IGpassword" label="Password:" label-for="password">
                                            <b-form-input id="password" type="password" v-model="password" required placeholder="Ingresa la contraseña"></b-form-input>
                                        </b-form-group>
                                    </div>
                            </div>
                                 
                         </b-form>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" v-if="typeAction==1" @click="addUsuario()">Add User</button>
                        <button type="button" class="btn btn-primary" v-if="typeAction==2" @click="editUsuario()">Edit User</button>
                        <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button> 
                    </div>
                    
                </div>
            </div>
            
        </div>
        <!-- fin modal -->
    </div>
    
</template>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<script>
import bForm from 'bootstrap-vue/es/components/form/form';
import bFormInput from 'bootstrap-vue/es/components/form-input/form-input';
import bFormGroup from 'bootstrap-vue/es/components/form-group/form-group';
import bFormCheckbox from 'bootstrap-vue/es/components/form-checkbox/form-checkbox';
import Multiselect from 'vue-multiselect';

export default {
    components:{bForm,bFormInput,bFormGroup,Multiselect,bFormCheckbox},
    data(){
        return{
            arrayUsuarios:[],
            arrayPaises:[],
            arrayDepartamentos:[],
            arrayMunicipios:[],
            titleModal:'',
            email:'',
            name:'',
            password:'',
            id_usuario:0,        
            errorUser:[],
            typeAction:0,
            pagination:{
                    'total':0,
                    'current_page':0,
                    'per_page':0,
                    'last_page':0,
                    'from':0,
                    'to':0,
                },
             offset:3,
             search:'',   
        }
    },
    watch:{
        search:function(value){
            this.listarUsuario(1,value);
        }
    },
    computed:{
            isActived:function(){
                return this.pagination.current_page;
            },
            pagesNumber:function(){
                if (!this.pagination.to) {
                    return[];
                }
                var from =this.pagination.current_page-this.offset;
                if (from<1) {
                    from=1;
                }
                var to=from+(this.offset*2);
                if (to>=this.pagination.last_page) {
                    to=this.pagination.last_page;  
                }
                var pagesArray=[];
                while (from<=to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;
            },

        },
    
    methods:{
        //funcion para abrir modal de agregar o editar
        abrirModal(model,action,data=[]){
            switch(model){
                case "user":{
                    switch(action){
                        case "add":{
                           this.titleModal="Agregar Usuarios";
                           this.typeAction=1;
                            this.name='';
                            this.email='';
                            this.password='';
                           this.id_usuario=0;
                            break;
                        }
                        case "edit":{
                            this.titleModal="Editar Usuarios";
                            this.typeAction=2;
                            this.name=data['name'];
                            this.email=data['email'];
                            this.password=data['password'];
                            this.id_usuario=data['id'];
                            break;
                        }
                    }
                }
            }
        },
            listarUsuario(page,search){
                let me=this;
                axios.get('/usuarios_crud?page='+page+'&search='+search).then(response => {
                this.arrayUsuarios=response.data.user.data;
                me.pagination=response.data.pagination;
            });
            
        },
        changePage(page,search){
                let me=this;
                //actualiza la pagina actual
                me.pagination.current_page=page;
                //envia la peticion para visualizar la data de esa pagina
                me.listarUsuario(page,search);
            },
        addUsuario(){
            let me=this;
            axios.post('/usuarios_crud/',{
                'email':this.email,
                'name':this.name,
                'password':this.password,
                'municipio_id':this.municipio.id,
        
            }).then(response=>{
                this.cerrarModal();
                toastr.success("Usuario Agregado Correctamente");
                this.listarUsuario(1,'');
            }).catch(error=>{
                this.errorUser=error.response.data.errors;
                $.each(error.response.data.errors,function(key,value){
                    toastr.error(value);
                });
            });
        },
        editUsuario(){
            let me=this;
            axios.put('/usuarios_crud/'+this.id_usuario,{
                'email':this.email,
                'name':this.name,
                'password':this.password,
                'municipio_id':this.municipio.id,
                'id':this.id_usuario,
            }).then(response=>{
                this.cerrarModal();
                toastr.info("Usuario Editado Correctamente");
                this.listarUsuario(1,'');
            }).catch(error=>{
                this.errorUser=error.response.data.errors;
                $.each(error.response.data.errors,function(key,value){
                    toastr.error(value);
                });
            });
        },
        deleteUsuario(id){
            console.log(id);
                swal.fire({
                        title: 'Esta Seguro De Eliminar Este Usuario?',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Accept',
                        cancelButtonText: 'Cancel',
                        confirmButtonClass: 'btn btn-success',
                        cancelButtonClass: 'btn btn-danger',
                        buttonsStyling: false,
                        reverseButtons: true
                        }).then((result) => {
                        if (result.value) {
                            let me=this;
                            axios.post('/usuarios_crud/delete',{'id':id}).then(function(response){
                                me.listarUsuario(1,'');
                                swal.fire(
                                'Eliminado!',
                                'El usuario Ha Sido Eliminado',
                                'success'
                                )
                            }).catch(function(error){
                                console.log(error)
                            });
                        
                        } else if (
                        // Read more about handling dismissals
                        result.dismiss === swal.DismissReason.cancel
                        ) {
                        
                        }
                        
                 })
            
            },
        cerrarModal(){
            $(".modal-backdrop").remove();
            $("#myModal").modal('hide');
        },
    },
    mounted(){
        this.listarUsuario(1,'');
    }
}
</script>