import React from 'react';
import { Box, Button, CardMedia, Grid, Paper, Typography } from '@mui/material';
import BrushOutlinedIcon from '@mui/icons-material/BrushOutlined';
import { Link } from 'react-router-dom';


const Main = () => {
    return (
        <>
            <Box sx={{ bgcolor:"white",color: "black", minHeight: "125vh", position: "relative" }}>
                {/* Introduction Content */}
                <Box sx={{ position: "relative", height: "50vh" }}>

                    <img 
                        src="/nature.png" 
                        alt="nothing" 
                        style={{ 
                            position: 'absolute', 
                            height: "100%", 
                            width: "100%", 
                            objectFit: "cover", 
                            objectPosition: "10% 10%", 
                            zIndex: 1, 
                            top: 0, 
                            left: 0 
                        }} 
                    />

                    <Typography 
                        sx={{
                            position: 'absolute', 
                            zIndex: 2, 
                            textAlign: 'center', 
                            color: "white", 
                            top: "50%",
                            left: "50%", 
                            transform: 'translate(-50%, -100%)', 
                            padding: '1rem', 
                            fontSize: "4rem", 
                            fontWeight: "bold"
                        }}
                    >
                        Welcome TO VisionVerse
                    </Typography>


                    {/* Features Contents */}
                    <Paper 
                        sx={{ 
                            position: "absolute", 
                            width: "auto", 
                            bgcolor: "white", 
                            zIndex: 3, 
                            top: "70%", 
                            left: "15%", 
                            borderRadius: "2%", 
                            padding: "10px 30px" 
                        }}
                    >
                        {/* Most Loved Images */}
                        <Box>
                            <Typography sx={{ fontSize: "2rem" }}>
                                <BrushOutlinedIcon sx={{ fontSize: '2rem', marginRight: '2px' }} />
                                Most Loved Images
                            </Typography>
                            <Box sx={{ display: "flex", flexWrap: "wrap", gap: "10px" }}>

                                <Paper sx={{ maxWidth: 300, margin: 'auto', mb: '1rem' }}>
                                    <img src="https://via.placeholder.com/300x200" alt="placeholder" style={{ width: '100%', height: 'auto' }} />
                                </Paper>
                                <Paper sx={{ maxWidth: 300, margin: 'auto', mb: '1rem' }}>
                                    <img src="https://via.placeholder.com/300x200" alt="placeholder" style={{ width: '100%', height: 'auto' }} />
                                </Paper>
                                <Paper sx={{ maxWidth: 300, margin: 'auto', mb: '1rem' }}>
                                    <img src="https://via.placeholder.com/300x200" alt="placeholder" style={{ width: '100%', height: 'auto' }} />
                                </Paper>
                                <Paper sx={{ maxWidth: 300, margin: 'auto', mb: '1rem' }}>
                                    <img src="https://via.placeholder.com/300x200" alt="placeholder" style={{ width: '100%', height: 'auto' }} />
                                </Paper>

                            </Box>

                        </Box>
                        {/* Most Loved Features */}
                        <Box>
                            <Typography sx={{ fontSize: "2rem" }}>
                                <BrushOutlinedIcon sx={{ fontSize: '2rem', marginRight: '2px' }} />
                                Most Loved Features
                            </Typography>
                            <Grid container spacing={2}>
                                <Grid item xs={12} sm={4}>
                                    <Paper sx={{ maxWidth: 400, margin: 'auto', mb: '1rem' }}>
                                        <CardMedia
                                            component="img"
                                            image="https://via.placeholder.com/300x200"
                                            alt="placeholder"
                                            style={{ width: '100%', height: 'auto' }}
                                        />
                                        <Box display={"flex"} justifyContent={'space-between'} padding={"10px"}>
                                            <Typography variant="body1">
                                                Description of the feature goes here.
                                            </Typography>
                                            <Button variant="contained" color="primary" component={Link} to="/image">
                                                Image Generate
                                            </Button>
                                        </Box>
                                    </Paper>
                                </Grid>
                                <Grid item xs={12} sm={4}>
                                    <Paper sx={{ maxWidth: 400, margin: 'auto', mb: '1rem' }}>
                                        <CardMedia
                                            component="img"
                                            image="https://via.placeholder.com/300x200"
                                            alt="placeholder"
                                            style={{ width: '100%', height: 'auto' }}
                                        />
                                        <Box display={"flex"} justifyContent={'space-between'} padding={"10px"}>
                                            <Typography variant="body1">
                                                Description of the feature goes here.
                                            </Typography>
                                            <Button variant="contained" color="primary" >
                                                Generate
                                            </Button>
                                        </Box>
                                    </Paper>
                                </Grid>
                                <Grid item xs={12} sm={4}>
                                    <Paper sx={{ maxWidth: 400, margin: 'auto', mb: '1rem' }}>
                                        <CardMedia
                                            component="img"
                                            image="https://via.placeholder.com/300x200"
                                            alt="placeholder"
                                            style={{ width: '100%', height: 'auto' }}
                                        />
                                        <Box display={"flex"} justifyContent={'space-between'} padding={"10px"}>
                                            <Typography variant="body1">
                                                Description of the feature goes here.
                                            </Typography>
                                            <Button variant="contained" color="primary" >
                                                Generate
                                            </Button>
                                        </Box>
                                    </Paper>
                                </Grid>
                            </Grid>

                        </Box>
                    </Paper>
                </Box>
            </Box>

        </>
    );
}

export default Main;
