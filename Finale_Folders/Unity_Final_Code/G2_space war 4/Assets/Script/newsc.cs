using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using FishNet.Object;


public class newsc : NetworkBehaviour
{
    public float movesp = 10f;
    private CharacterController con;

    private void Awake()
    {
        con = GetComponent<CharacterController>();
    }

    // Update is called once per frame
    private void Update()
    {
            if(!base.IsOwner) 
            return;

        float ho = Input.GetAxisRaw("Horizontal");
        float ve = Input.GetAxisRaw("Vertical");

        Vector3 offset = new Vector3(ho, 0 ,ve) * (movesp * Time.deltaTime);

        con.Move(offset);
        
    }
}
