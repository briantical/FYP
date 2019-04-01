import React, { Component } from 'react';
import { Route, Switch } from "react-router-dom"
import {Login, Profile, Register, Password} from './authentication'

export default class Index extends Component {
    render() {
        return (
            <Switch>                              
                <Route exact path="/login" component={Login} />
                <Route path="/register" component={Register} />
                <Route path="/completeprofile" component={Profile} /> 
                <Route path="/resetpassword" component={Password} /> 
                <Route component={Login}/>            
            </Switch>
        );
    }
}
