using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using FishNet.Object;

public class move : NetworkBehaviour
{
    public float movesp = 5f;
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
        Vector3 offset = new Vector3(ho, Physics.gravity.y,ve) * (movesp * Time.deltaTime);

        con.Move(offset);
        
    }
}
