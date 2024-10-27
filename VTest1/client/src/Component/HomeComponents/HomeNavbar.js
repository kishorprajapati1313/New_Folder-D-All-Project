import React, { useState, useEffect } from 'react'
import { Box, Button, IconButton, Typography } from "@mui/material"
import AccountCircleOutlinedIcon from '@mui/icons-material/AccountCircleOutlined';
import { Link, useLocation, useNavigate } from 'react-router-dom';

export function getuser() {
    let user = localStorage.getItem('userdata');
    // console.log(user)
    if (user) {
        user = JSON.parse(user);
    } else {
        user = null;
    }
    return user;
}
const HomeNavbar = () => {
    const [isLoggedIn, setIsLoggedIn] = useState(false);
    const [user, setUser] = useState(null);
    const location = useLocation();
    const navigate = useNavigate();

    console.log(isLoggedIn);
    useEffect(() => {
        if (location.pathname === "/home") {
            const collectuserdata = JSON.stringify(localStorage.getItem("userdata"));
            setUser(collectuserdata)
        }
        const storedUser = JSON.parse(localStorage.getItem('userdata'));
        if (storedUser) {
            setUser(storedUser);
            setIsLoggedIn(true);
        }
    }, [location.pathname]); // Run only once when component mounts

    const handleLogout = () => {
        // Perform logout logic here (e.g., clear localStorage, update state)
        localStorage.removeItem('userdata');
        setUser(null);
        setIsLoggedIn(false);
        navigate("/")
    };

    return (
        <>
            <Box sx={{ borderBottom: "2px solid black", height: "20%", display: "flex", alignItems: "center", justifyContent: "space-between", padding: "0 16px" }}>
                <Box sx={{ ml: 5, padding: "5px 1px", display: "flex", alignItems: "center", justifyContent: "center" }}>

                    {/* LOGO */}
                    <img src="/logo192.png" alt="logo" style={{ height: '40px', width: "auto" }} />
                    <Typography sx={{ padding: "0px 10px" }}>
                        Visionverse
                    </Typography>
                </Box>
                {/* LOGIN */}
                <Box sx={{ mr: 2, display: "flex", alignItems: "center", justifyContent: "center", }}>
                    {user ? (
                        <>
                            <Button  variant="contained" backgroundColor="blue" onClick={handleLogout} sx={{ "&:active": { boxShadow: "0px 0px 10px 10px white" } }}>
                                Logout
                            </Button>
                            <IconButton sx={{color:"black" }}  component={Link} to="/profile/home">
                            <AccountCircleOutlinedIcon sx={{ fontSize: '40px'}}/>
                            </IconButton>

                        </>
                    ) : (
                        <Button  variant="contained" backgroundColor="blue" component={Link} to="/login" sx={{ "&:active": { boxShadow: "0px 0px 10px 10px white" } }}>
                            Login
                        </Button>
                    )}


                </Box>
            </Box>

        </>
    )
}

export default HomeNavbar