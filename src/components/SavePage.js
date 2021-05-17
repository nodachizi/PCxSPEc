import React,{ useState } from 'react'
import PropTypes from 'prop-types';
import axios from 'axios';
import 'bootstrap/dist/css/bootstrap.min.css';
import {
        Badge,
        Button,
        Card,
        Navbar,
        Nav,
        Table,
        Container,
        Row,
        Col,
        Form,
        OverlayTrigger,
        Tooltip,
        FormControl,
        ButtonGroup
      } from "react-bootstrap";
export default function SavePage({ session,setSession }) {

  const HandleSubmit = async e => {
    e.preventDefault();
    const {data} = await axios.post('http://sstwork.thddns.net:7771/savecom.php', JSON.stringify({
            cpu: session.cpu,
            gpu: session.gpu,
            mtb: session.mtb,
            ram: session.ram,
            psu: session.psu,
            str: session.str
    }));

    setSession({
            cpu: session.cpu,
            gpu: session.gpu,
            mtb: session.mtb,
            ram: session.ram,
            psu: session.psu,
            str: session.str,
    //------------------
            cpu_price: session.cpu_price,
            gpu_price: session.gpu_price,
            mtb_price: session.mtb_price,
            ram_price: session.ram_price,
            psu_price: session.psu_price,
            str_price: session.str_price,
    //-----------------
            key: {data}.data.key,
            mode: null,
            //-----------------
            mtb_socket: session.mtb_socket,
            cpu_icon: session.cpu_icon,
            gpu_icon: session.gpu_icon,
            mtb_icon: session.mtb_icon,
            ram_icon: session.ram_icon,
            psu_icon: session.psu_icon,
            str_icon: session.str_icon
            });
  }


  return(
    <div>
            
    <form onSubmit={HandleSubmit}>
        <div>
            <Button variant="dark" type="submit">SAVE</Button>
        </div>
    </form>

    </div>
  )
}