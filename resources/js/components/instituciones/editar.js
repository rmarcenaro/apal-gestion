import axios from 'axios'
import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import { Redirect } from 'react-router-dom'

class InstitucionFormulario extends Component {

    constructor(props) {
        super(props)
        this.state = {
            id: 0,
            nombre: '',
            estado_id: false
        };
        this.handleInputChange = this.handleInputChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    componentDidMount () {
        axios.get('/api/instituciones/' + this.props.match.params.id).then(response => {
          this.setState({
              id: response.data.data.id,
              nombre: response.data.data.nombre,
              estado_id: (response.data.data.estado_id == 1) ? true : false
          })
        })
    }

    handleInputChange(event) {
        const target = event.target;
        const value = target.type === 'checkbox' ? target.checked : target.value;
        const name = target.name;

        this.setState({
            [name]: value
        });
    }

    handleSubmit(event) {

        axios.put('/api/instituciones/' + this.props.match.params.id, {
            nombre: this.state.nombre,
            estado_id: (this.state.estado_id == true) ? 1 : 0
        }).then(response => {
            if (response.status == 200) {
                window.location = '/instituciones';
            }
        }).catch(e => {
            console.log(e);
        });

        event.preventDefault();
    }

    render() {
        const { id, nombre, estado_id } = this.state

        if (id) {

            return (
                <div className='container'>
                    <div className='row justify-content-center'>
                        <div className='col-md-8'>
                            <div className='card'>
                                <div className='card-header'>Editando Institución</div>

                                <div className='card-body'>
                                    <div className='alert alert-success' role='alert'>
                                        [SESSIONSTATUS]
                                    </div>
                                    <div>
                                        <form onSubmit={this.handleSubmit}>
                                            <input type="hidden" name="id" value={id} />
                                            <label>Nombre:
                                            <input type="text" name="nombre" value={nombre} onChange={this.handleInputChange} />
                                            </label>
                                            <label>Activa?:
                                            <input type="checkbox" name="estado_id" checked={(estado_id == 1) ? true : false} onChange={this.handleInputChange} />
                                            </label>
                                            <input type="submit" value="Guardar" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            )

        } else {
            return (
                <div>Ops.</div>
            )
        }
    }

}

export default InstitucionFormulario

if (document.getElementById('apalapp')) {
    ReactDOM.render(<InstitucionFormulario />, document.getElementById('apalapp'))
}
