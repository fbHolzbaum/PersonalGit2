using UnityEngine;
using System.Collections;

public class AddForce : MonoBehaviour {

    public float speed = 10000;
    private Rigidbody rb;

	// Use this for initialization
	void Start () {
        rb = transform.GetComponent<Rigidbody>();
	}
	
	// Update is called once per frame
	void FixedUpdate () {
	    if(Input.GetAxis("Vertical")!=0)
        {
            rb.AddForce(transform.forward * speed);
        }
	}
}
