using UnityEngine;
using System.Collections;

public class AddForce : MonoBehaviour {

    public float verticalThrust = 10000;
    public float horizontalThrust = 500;
    private float rotationSpeed = 100;
    private Vector3 targetRotation;
    private Vector3 currentAngle;
    private Rigidbody rb;
    public GameObject model;

	// Use this for initialization
	void Start () {
        rb = transform.GetComponent<Rigidbody>();
        currentAngle = transform.eulerAngles;
    }
	
	// Update is called once per frame
	void FixedUpdate () {
        Debug.Log(rb.velocity);
        
        if (Input.GetAxis("Vertical")!=0)
        {
            rb.AddForce(transform.forward * verticalThrust * Input.GetAxis("Vertical"));
        }
        if (Input.GetAxis("Horizontal") != 0)
        {
            rb.AddForce(transform.right * horizontalThrust * Input.GetAxis("Horizontal"));

            //Rotate
            if (Input.GetAxis("Horizontal") < 0)
            {
                targetRotation = new Vector3(0, 0, 25);
            }
            else if (Input.GetAxis("Horizontal") > 0)
            {
                targetRotation = new Vector3(0, 0, -25);
            }        
        }
        else
        {
            //Rotate
            targetRotation = new Vector3(0, 0, 0);
        }
        currentAngle = new Vector3
        (
            Mathf.LerpAngle(currentAngle.x, targetRotation.x, Time.deltaTime),
            Mathf.LerpAngle(currentAngle.y, targetRotation.y, Time.deltaTime),
            Mathf.LerpAngle(currentAngle.z, targetRotation.z, Time.deltaTime)
        );

        model.transform.eulerAngles = currentAngle;
    }
}
