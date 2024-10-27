using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using TMPro;

public class GunSys : MonoBehaviour
{
    [Header("Audio")]
    public AudioSource src;
    public AudioClip reloadsrc, firesrc;

     [Header("Gun State")]
    // Gun State
    public int damage = 20;
    public float tbshooting, reloadingtime, spread, range, tbshots;
    public int magazingsize, bulletpertap;
    public bool allowbuttonhold;
    int bleft, bshot;

    // bool
    bool shooting, readytoshoot, reloading;

    // References
    public Camera fpsCam;
    public Transform attackpoint;
    public RaycastHit rayhit;
    public LayerMask whatenemy;

    // Graphics
     [Header("Graphics")]
    public GameObject muzzelflash, bulletHole, GroundHole;

     [Header("TEXT")]
    public TextMeshProUGUI text;

    private void Awake()
    {
        src = GetComponent<AudioSource>();

        bleft = magazingsize;
        readytoshoot = true;
    }

    private void Update()
    {
        MyInput();

        // setText
        text.SetText(bleft + "/" + magazingsize);
    }

    private void MyInput()
    {
        shooting = Input.GetKey(KeyCode.Mouse0);

        if (Input.GetKeyDown(KeyCode.R) && bleft < magazingsize && !reloading) Reload();

        // shoot
        if (readytoshoot && shooting && !reloading && bleft > 0)
        {
            bshot = bulletpertap;
            Shoot();

              // Play the firesrc audio only if it's not already playing
        if (!src.isPlaying)
        {
            src.clip = firesrc;
            src.pitch = 26f;
            src.Play();
        }
        }
    }

    private void Shoot()
    {
        readytoshoot = false;
        
           
        // RayCast
        if (Physics.Raycast(fpsCam.transform.position, fpsCam.transform.forward, out rayhit, range, whatenemy))
        {
            

            // Debug.Log(rayhit.collider.name);
            if(rayhit.collider.CompareTag ("Enemy")){

                // Debug.Log("Hello This is enemy");
                //Check if object have enemyproperties script??
                EnemyProperties enemyProperties = rayhit.collider.GetComponent<EnemyProperties>();

                // Graphics
                GameObject bulletHoleInstance =Instantiate(bulletHole, rayhit.point, Quaternion.Euler(0, 180, 0));
                
                if(enemyProperties != null)
                {
                   enemyProperties.TakeDamage(damage);
                }

                // Destroy the instantiated prefabs after a certain time
                Destroy(bulletHoleInstance, 1f);  // Adjust the time as needed
            }
        }

        // Graphics
        GameObject GroundHoleInstance = Instantiate(GroundHole, rayhit.point, Quaternion.Euler(0, 180, 0));
        GameObject muzzleFlashInstance = Instantiate(muzzelflash, attackpoint.position, Quaternion.identity);

          // Destroy the instantiated prefabs after a certain time
        Destroy(GroundHoleInstance, 0.5f);  // Adjust the time as needed
        Destroy(muzzleFlashInstance, 0.5f);  // Adjust the time as needed


        bleft--;
        bshot--;

        Invoke("ResetShot", tbshooting);

        if (bshot > 0 && bleft > 0)
            Invoke("Shoot", tbshots);
    }

    private void ResetShot()
    {
        readytoshoot = true;
    }

    private void Reload()
    {
        src.clip = reloadsrc;
        src.pitch = 1f;
        src.Play();

        reloading = true;
        Invoke("RloadFinish", reloadingtime);
    }

    private void RloadFinish()
    {
        bleft = magazingsize;
        reloading = false;
    }
}
