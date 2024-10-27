using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;
using UnityEngine.UI;

public class PlayerPropertise : MonoBehaviour
{
    public float playerHealth = 100f;
    public float Health;

    public Slider healthSlider; 

    public void Start () {
        Health = playerHealth;
        
    }

    // Update is called once per frame
    void Update()
    {
        if(healthSlider.value != Health)
        {
            healthSlider.value = Health;
        }
    }

    public void takedamage(float damage){
        playerHealth -= damage;
        Health = playerHealth;

        // Debug.Log("Player Health:" + remainHealth);

        if(playerHealth <= 0){
        //    SceneManager.LoadScene("AfterDeath");
        
        SceneManager.LoadScene("AfterDeath1.1");
            
        }
    }

}
