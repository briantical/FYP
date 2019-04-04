import React, { Component } from 'react';
import { Button , Form } from 'react-bootstrap';
import './authentication.css'
//import '../../assets/muk.png'

export default class Login extends Component {
    render() {
        return (
            <div className="container outerContainer">
                <div className="branding">
                    <div className="collegeBrand">
                        <div className="sytemBrand">Final Year Project System</div>
                        <div className="collegeName">COLLEGE OF COMPUTING AND INFORMATION SCIENCES</div>
                    </div>
                    <div className="logoContainer">
                        <img src={"../../assets/muk.png"} alt="SCIT Logo" width="50px" height="50px"/> 
                    </div>                    
                </div>
              <Form className="form">
                <Form.Group controlId="formBasicEmail" autoComplete="off">
                    <Form.Label>Email address</Form.Label>
                    <Form.Control type="email" placeholder="Enter email" />                    
                </Form.Group>

                <Form.Group controlId="formBasicPassword">
                    <Form.Label>Password</Form.Label>
                    <Form.Control type="password" placeholder="Password" />
                </Form.Group>
                <div className="btnContainer">
                    No account? register
                </div>
                <div className="btnContainer">
                    <Button variant="outline-primary" type="submit" className="toning">
                        LOGIN
                    </Button>
                </div>                              
            </Form>
            </div>
        );
    }
}
